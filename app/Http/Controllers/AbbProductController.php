<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use File;

class AbbProductController extends Controller
{

    public function index() {

        $products = Product::whereNotNull('abb_category_id')->get();

        return view('admin.products.abb.index', compact('products'));

    }

    public function create() {

        return view('admin.products.abb.create');

    }

    public function show(Request $request){

        $this->validate($request, [
           'item_id' => 'required'
        ], ['item_id.required' => 'عفوا قم بإدخال رقم المنتج']);

        $client = new Client;

        $result = $client->post('http://otapi.net/OtapiWebService2.asmx/GetItemFullInfo', [
            'headers' => [
                'Accept'     => 'application/xml',
            ],

            'form_params' => [
                'instanceKey' => env('OTA_API_KEY'),
                'language' => 'en',
                'itemId' => 'products-'.$request->item_id,
            ]

        ]);

        $xml = new \SimpleXMLElement($result->getBody()->getContents());

        /*dd($xml->OtapiItemFullInfo);*/

        $product['title'] = (string)$xml->OtapiItemFullInfo->Title;
        $product['description'] = (string)$xml->OtapiItemFullInfo->Title;
        $product['price'] = (string)$xml->OtapiItemFullInfo->Price->ConvertedPriceWithoutSign;
        $product['company'] = (string)$xml->OtapiItemFullInfo->ProviderType;
        $product['company_url'] = (string)$xml->OtapiItemFullInfo->ExternalItemUrl;
        $product['primary_code'] = (string)$xml->OtapiItemFullInfo->Id;
        $product['category_id'] = (string)$xml->OtapiItemFullInfo->CategoryId;

        /*dd($product);*/

        $categories = Categorie::where('active', 1)->get();

        return view('admin.products.abb.show', compact(['product', 'categories']));

    }

    public function store(Request $request) {

        $product = new Product;

        //validation
        $messages = [
            'secondary_code.required' => 'عفوا قم بإدخال الرمز الفرعي',
            'secondary_code.numeric' => 'عفوا قم بإدخال رمز فرعي صحيح',
            'tariff_code.required' => 'عفوا قم بإدخال رمز التعريفة الجمركية',
            'name.required' => 'عفوا بإدخال اسم المنتج',
            'description.required' => 'عفوا قم بإدخال تفاصيل المنتج',
            'price.required' => 'عفوا قم بإدخال سعر المنتج',
            'price.numeric' => 'عفوا قم بإدخال سعر صحيح للمنتج',
            'discount.numeric' => 'عفوا قم بإدخال قيمة تخفيض صحيحه',
            'discount.min:0' => 'اقل قيمة للتخفيض هي 0',
            'discount.max:100' => 'اكبر قيمة للتخفيض هي 100',
            'less_amount_text.required' => 'عفوا قم بإدخال تمييز اقل كمية للمنتج',
            'less_amount_value.required' => 'عفوا قم بإدخال قمية اقل كمية للمنتج',
            'less_amount_value.integer' => 'عفوا بإدخال قيمية صحيح لأقل كمية للمنتج',
            'waiting_period.required' => 'عفوا قم بإدخال فترة الانتظار',
            'waiting_period.integer' => 'عفوا قم بإدخال عدد ايام صحيح لفترة الانتظار',
            'company.required' => 'عفوا قم بإدخال اسم الشركة',
            'company_website.required' => 'عفوا قم بإدخال رابط موقع الشركة',
            'size_text.required' => 'عفوا قم بإدخال تمييز حجم المنتج',
            'size_value.required' => 'عفوا قم بإدخال قمية حجم المنتج',
            'size_value.numeric' => 'عفوا قم بإدخال قيمة صحيحة لحجم المنتج',
            'color.required' => 'عفوا قم بإدخال لون المنتج',
        ];

        $this->validate($request, [
            'secondary_code' => 'required|numeric',
            'tariff_code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount' => 'numeric|min:0|max:100',
            'less_amount_text' => 'required',
            'less_amount_value' => 'required|integer',
            'waiting_period' => 'required|integer',
            'company' => 'required',
            'company_website' => 'required',
            'size_text' => 'required',
            'size_value' => 'required|numeric',
            'color' => 'required',
        ], $messages);

        //save data
        $product->sub_category_id = $request->sub_category_id;
        $product->primary_code = $request->primary_code;
        $product->secondary_code = $request->secondary_code;
        $product->tariff_code = $request->tariff_code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->less_amount_text = $request->less_amount_text;
        $product->less_amount_value = $request->less_amount_value;
        $product->waiting_period = $request->waiting_period;
        $product->company = $request->company;
        $product->company_website = $request->company_website;
        $product->size_text = $request->size_text;
        $product->size_value = $request->size_value;
        $product->color = $request->color;
        $product->active = $request->active;
        $product->show_with_products = 0;
        $product->abb_id = $request->primary_code;
        $product->abb_category_id = $request->category_id;

        $product->save();

        $client = new Client;

        $result = $client->post('http://otapi.net/OtapiWebService2.asmx/GetItemFullInfo', [
            'headers' => [
                'Accept'     => 'application/xml',
            ],

            'form_params' => [
                'instanceKey' => env('OTA_API_KEY'),
                'language' => 'en',
                'itemId' => $product->abb_id,
            ]

        ]);

        $xml = new \SimpleXMLElement($result->getBody()->getContents());

        $abb_product_images = $xml->OtapiItemFullInfo->Pictures->ItemPicture;

        //store products images

        foreach($abb_product_images as $image){

            $product_image_content = file_get_contents($image->Medium);
            $product_image_name = time().'.jpg';
            File::put(public_path().'/images/products/'.$product_image_name, $product_image_content);

            $product_image = new Image;
            $product_image->product_id = $product->id;
            $product_image->name = $product_image_name;
            $product_image->url = asset('images/products/'.$product_image_name);
            $product_image->save();

        }

        $images = Image::where('product_id', $product->id)->get();

        //redirect to products list
        return view('admin.products.images.index', compact(['images', 'product']));

    }

    public function change_status($id) {

        $product = Product::findOrFail($id);

        if($product->show_with_products == 1){

            $product->show_with_products = 0;

        }else {

            $product->show_with_products = 1;

        }

        $product->save();

        return redirect(url('/admin/products/abb'));

    }

}
