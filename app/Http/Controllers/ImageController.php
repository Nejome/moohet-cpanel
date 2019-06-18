<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{

    public function index($id){

        $product = Product::findOrFail($id);

        return view('admin.products.images.index', compact('product'));

    }

    public function store(Request $request, $product_id) {

        $this->validate($request, [
           'image' => 'required|image'
        ]);

        $image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path().'/images/products', $image_name);

        $image = new Image;
        $image->product_id = $product_id;
        $image->name = $image_name;
        $image->url = asset('images/products/'.$image_name);
        $image->save();

        return redirect()->back();
    }

    public function reset_abb_product_images($id){

        $product = Product::findOrFail($id);

        foreach($product->images as $image){

            if(file_exists(public_path().'/images/products/'.$image->name)){

                unlink(public_path().'/images/products/'.$image->name);

            }

            $image->delete();

        }

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

        return redirect()->back();

    }

    public function delete($id){

        $image = Image::findOrFail($id);

        if(file_exists(public_path().'/images/products/'.$image->name)){

            unlink(public_path().'/images/products/'.$image->name);

        }

        $image->delete();

        return redirect()->back();

    }

}
