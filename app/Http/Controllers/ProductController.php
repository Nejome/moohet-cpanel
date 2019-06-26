<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categorie;
use App\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where(['trash' => 0, 'show_with_products' => 1])->get();

        return view('admin.products.index', compact('products'));
    }

    public function trash()
    {
        $products = Product::where('trash', 1)->get();

        return view('admin.products.trash', compact('products'));
    }

    public function recovery($id){

        $product = Product::findOrFail($id);

        $product->trash = 0;

        $product->save();

        session()->flash('recovery_msg', 'تمت استعادة المنتج بنجاح');

        return redirect(route('products.index'));

    }

    public function create()
    {

        $categories = Categorie::where('active', 1)->get();

        return view('admin.products.create', compact('categories'));

    }


    public function store(Request $request)
    {

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
            'image1.required' => 'عفوا قم بإختيار صورة المنتج',
            'image2.required' => 'عفوا قم بإختيار صورة المنتج',
            'image3.required' => 'عفوا قم بإختيار صورة المنتج',
            'image4.required' => 'عفوا قم بإختيار صورة المنتج',
            'image1.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image2.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image3.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image4.image' => 'عفوا قم يإختيار صورة صحيحة',
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
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
            'image4' => 'required|image',
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

        $image1_name = time().'1.'.$request->image1->getClientOriginalExtension();
        request()->image1->move(public_path('images'), $image1_name);
        $image1->name = $image1_name;
        $image1->url = asset('images/'.$image1_name);
        $image1->product_id = $product->id;
        $image1->save();

        $image2_name = time().'2.'.$request->image2->getClientOriginalExtension();
        request()->image2->move(public_path('images'), $image2_name);
        $image2->name = $image2_name;
        $image2->url = asset('images/'.$image2_name);
        $image2->product_id = $product->id;
        $image2->save();

        $image3_name = time().'3.'.$request->image3->getClientOriginalExtension();
        request()->image3->move(public_path('images'), $image3_name);
        $image3->name = $image3_name;
        $image3->url = asset('images/'.$image3_name);
        $image3->product_id = $product->id;
        $image3->save();

        $image4_name = time().'4.'.$request->image4->getClientOriginalExtension();
        request()->image4->move(public_path('images'), $image4_name);
        $image4->name = $image4_name;
        $image4->url = asset('images/'.$image4_name);
        $image4->product_id = $product->id;
        $image4->save();

        session()->flash('success_msg', 'تمت إضافة المنتج الجديد بنجاح');

        //redirect to products list
        return redirect(route('products.index'));

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $categories = Categorie::where('active', 1)->get();

        $product_images = Image::where('product_id', $id)->get();

        return view('admin.products.edit', compact(['product', 'categories', 'product_images']));

    }


    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if(isset($request->image1_id) && $request->image1_id != ''){

            $image1 =  Image::find($request->image1_id);

        }else {

            $image1 = new Image;

        }

        if(isset($request->image2_id) && $request->image2_id != ''){

            $image2 =  Image::find($request->image2_id);

        }else {

            $image2 = new Image;

        }

        if(isset($request->image3_id) && $request->image3_id != ''){

            $image3 =  Image::find($request->image3_id);

        }else {

            $image3 = new Image;

        }

        if(isset($request->image4_id) && $request->image4_id != ''){

            $image4 =  Image::find($request->image4_id);

        }else {

            $image4 = new Image;

        }


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
            'image1.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image2.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image3.image' => 'عفوا قم يإختيار صورة صحيحة',
            'image4.image' => 'عفوا قم يإختيار صورة صحيحة',
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
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image',
            'image4' => 'image',
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

        if(isset($request->image1) && $request->image1){

            $old_image_path = public_path().'/images/'.$image1->name;

            if(isset($request->image1_id) && $request->image1_id != ''){

                if(file_exists($old_image_path)){

                    unlink($old_image_path);

                }

            }

            $image1_name = time().'1.'.$request->image1->getClientOriginalExtension();
            request()->image1->move(public_path('images'), $image1_name);
            $image1->name = $image1_name;
            $image1->url = asset('images/'.$image1_name);
            $image1->product_id = $product->id;
            $image1->save();

        }

        if(isset($request->image2) && $request->image2){

            $old_image_path = public_path().'/images/'.$image2->name;

            if(isset($request->image2_id) && $request->image2_id != ''){

                if(file_exists($old_image_path)){

                    unlink($old_image_path);

                }

            }

            $image2_name = time().'2.'.$request->image2->getClientOriginalExtension();
            request()->image2->move(public_path('images'), $image2_name);
            $image2->name = $image2_name;
            $image2->url = asset('images/'.$image2_name);
            $image2->product_id = $product->id;
            $image2->save();

        }

        if(isset($request->image3) && $request->image3){

            $old_image_path = public_path().'/images/'.$image3->name;

            if(isset($request->image3_id) && $request->image3_id != ''){

                if(file_exists($old_image_path)){

                    unlink($old_image_path);

                }

            }

            $image3_name = time().'3.'.$request->image3->getClientOriginalExtension();
            request()->image3->move(public_path('images'), $image3_name);
            $image3->name = $image3_name;
            $image3->url = asset('images/'.$image3_name);
            $image3->product_id = $product->id;
            $image3->save();

        }

        if(isset($request->image4) && $request->image4){

            $old_image_path = public_path().'/images/'.$image4->name;

            if(isset($request->image4_id) && $request->image4_id != ''){

                if(file_exists($old_image_path)){

                    unlink($old_image_path);

                }

            }

            $image4_name = time().'4.'.$request->image4->getClientOriginalExtension();
            request()->image4->move(public_path('images'), $image4_name);
            $image4->name = $image4_name;
            $image4->url = asset('images/'.$image4_name);
            $image4->product_id = $product->id;
            $image4->save();

        }

        session()->flash('update_msg', 'تم تعديل بيانات المنتج بنجاح');

        //redirect to products list
        return redirect(route('products.index'));

    }


    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        $product->trash = 1;

        $product->save();

        session()->flash('trash_msg', 'تم ارسال المنتج الي سلة المحذوفات');

        return redirect(route('products.index'));

    }

}
