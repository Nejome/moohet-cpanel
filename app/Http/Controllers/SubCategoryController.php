<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\sub_category;
use App\Product;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {

        $categories = sub_category::all();

        return view('admin.sub_categories.index', compact('categories'));

    }


    public function create()
    {

        $categories = Categorie::where('active', 1)->get();

        return view('admin.sub_categories.create', compact('categories'));

    }


    public function store(Request $request)
    {

        //validate the data

        $message = [
            'title.required' => 'عفوا قم بإدخال اسم الفئة',
            'image.required' => 'عفوا قم بإختيار صورة الفئة',
            'category_id.required' => 'عفوا قم بإختيار الفئة الام',
            'image.image' => 'عفوا قم بإختيار ملف صورة صحيح'
        ];

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'image|required',
        ], $message);


        //store the data and image

        $category = new sub_category;

        $category->title = $request->title;

        $category->category_id = $request->category_id;

        $image_name = time().$request->image->getClientOriginalExtension();

        $request->image->move(public_path('images'), $image_name);

        $category->image = $image_name;

        $category->active = $request->active;

        $category->url = asset('images/'.$image_name);

        $category->save();

        //set flash message

        session()->flash('success_msg', 'تم اضافة الفئة الجديده بنجاح');

        //redirect to categories index

        return redirect(route('sub_categories.index'));

    }


    public function show(sub_category $sub_category)
    {
        //
    }


    public function edit(sub_category $sub_category)
    {

        $categories = Categorie::where('active', 1)->get();

        return view('admin.sub_categories.edit', compact(['sub_category', 'categories']));

    }


    public function update(Request $request, sub_category $sub_category)
    {

        //validate the data

        $message = [
            'title.required' => 'عفوا قم بإدخال اسم التصنيف الفرعي',
            'category_id.required' => 'عفوا قم بإختيار اسم الفئة الام',
        ];

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required'
        ], $message);


        //store the data and image

        $sub_category->title = $request->title;

        $sub_category->category_id = $request->category_id;

        if(isset($request->image) && $request->image != ''){

            $this->validate($request, [
                'image' => 'image'
            ]);

            $image_path = public_path().'/images/'.$sub_category->image;

            if(file_exists($image_path)){

                unlink($image_path);

            }

            $image_name = time().$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $image_name);

            $sub_category->image = $image_name;

            $sub_category->url = asset('images/'.$image_name);

        }

        $sub_category->active = $request->active;

        $sub_category->save();

        //set flash message

        session()->flash('edit_msg', 'تم تعديل الفئة بنجاح');

        //redirect to categories index

        return redirect(route('sub_categories.index'));

    }


    public function destroy($id)
    {

       $sub_category = sub_category::findOrFail($id);

       $products = Product::where('sub_category_id', $sub_category->id)->get();

       if(count($products) > 0) {

           session()->flash('delete_error_msg', 'عفوا هذا التصنيف يرتبط به منتج او عدة منتجات ، قم بتعديل او حذف المنتجات المرتبطه به حتي تستطيع حذفه');

           return redirect()->back();

       }

        $image_path = public_path().'/images/'.$sub_category->image;

        if(file_exists($image_path)){

            unlink($image_path);

        }

        $sub_category->delete();

        session()->flash('delete_msg', 'تم حذف التصنيف');

        return redirect(route('sub_categories.index'));

    }
}
