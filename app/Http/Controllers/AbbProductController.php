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
                'itemId' => 'abb-'.$request->item_id,
            ]

        ]);

        $xml = new \SimpleXMLElement($result->getBody()->getContents());

        /*dd($xml->OtapiItemFullInfo);*/

        $product['title'] = (string)$xml->OtapiItemFullInfo->Title;
        $product['description'] = (string)$xml->OtapiItemFullInfo->Title;
        $product['price'] = (string)$xml->OtapiItemFullInfo->Price->ConvertedPriceWithoutSign;
        $product['company'] = (string)$xml->OtapiItemFullInfo->ProviderType;
        $product['company_url'] = (string)$xml->OtapiItemFullInfo->ExternalItemUrl;
        $product['images'][0]['url'] = (string)$xml->OtapiItemFullInfo->Pictures->ItemPicture[0]->Medium;
        $product['images'][1]['url'] = (string)$xml->OtapiItemFullInfo->Pictures->ItemPicture[1]->Medium;
        $product['images'][2]['url'] = (string)$xml->OtapiItemFullInfo->Pictures->ItemPicture[2]->Medium;
        $product['images'][3]['url'] = (string)$xml->OtapiItemFullInfo->Pictures->ItemPicture[3]->Medium;
        $product['primary_code'] = (string)$xml->OtapiItemFullInfo->ExternalCategoryId;

        /*dd($product);*/

        $categories = Categorie::where('active', 1)->get();

        return view('admin.products.abb.show', compact(['product', 'categories']));

    }

    public function store(Request $request) {

        $product = new Product;
        $image1 = new Image;
        $image2 = new Image;
        $image3 = new Image;
        $image4 = new Image;

        //validation
        $messages = [
            'primary_code.required' => 'عفوا قم بإدخال الرمز الاساسي',
            'primary_code.numeric' => 'عفوا قم يإدخال رمز اساسي صحيح',
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
            'primary_code' => 'required|numeric',
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

        $product->save();

        //store product images

        $image1_name = time().'1'.$product->id.'.jpg';
        File::put(public_path() . '/images/' . $image1_name, file_get_contents($request->image1));
        $image1->name = $image1_name;
        $image1->url = asset('images/'.$image1_name);
        $image1->product_id = $product->id;
        $image1->save();

        $image2_name = time().'2'.$product->id.'.jpg';
        File::put(public_path() . '/images/' . $image2_name, file_get_contents($request->image2));
        $image2->name = $image2_name;
        $image2->url = asset('images/'.$image2_name);
        $image2->product_id = $product->id;
        $image2->save();

        $image3_name = time().'3'.$product->id.'.jpg';
        File::put(public_path() . '/images/' . $image3_name, file_get_contents($request->image3));
        $image3->name = $image3_name;
        $image3->url = asset('images/'.$image3_name);
        $image3->product_id = $product->id;
        $image3->save();

        $image4_name = time().'4'.$product->id.'.jpg';
        File::put(public_path() . '/images/' . $image4_name, file_get_contents($request->image4));
        $image4->name = $image4_name;
        $image4->url = asset('images/'.$image4_name);
        $image4->product_id = $product->id;
        $image4->save();


        session()->flash('success_msg', 'تمت إضافة المنتج الجديد بنجاح');

        //redirect to products list
        return redirect(route('products.index'));

    }

}
