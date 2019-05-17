<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function my_products($id){

         $products = Store::where('customer_id', $id)->get();

         return view('store.index', compact('products'));

    }

    public function my_products_show($store_id){

        $store = Store::findOrFail($store_id);

        return view('store.show', compact('store'));

    }

    public function edit(Request $request, $store_id) {

        $store = Store::find($store_id);

        $store->selling_price = $request->selling_price;
        $store->facebook = $request->facebook;
        $store->instagram = $request->instagram;
        $store->others = $request->others;
        $store->save();

        session()->flash('edit_success', 'تم تعديل بيانات المنتج بنجاح');

        return redirect()->back();

    }
}
