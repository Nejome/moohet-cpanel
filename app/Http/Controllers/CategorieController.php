<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\sub_category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {

        $categories = Categorie::all();

        return view('admin.categories.index', compact('categories'));

    }


    public function create()
    {

        return view('admin.categories.create');

    }


    public function store(Request $request)
    {

        //validate the data

        $message = [
            'title.required' => 'عفوا قم بإدخال اسم الفئة',
            'image.required' => 'عفوا قم بإختيار صورة الفئة',
            'image.image' => 'عفوا قم بإختيار ملف صورة صحيح'
        ];

        $this->validate($request, [
            'title' => 'required',
            'image' => 'image|required',
        ], $message);


        //store the data and image

        $category = new Categorie;

        $category->title = $request->title;

        $image_name = time().'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('images'), $image_name);

        $category->image = $image_name;

        $category->active = $request->active;

        $category->url = asset('images/'.$image_name);

        $category->save();

        //set flash message

        session()->flash('success_msg', 'تم اضافة الفئة الجديده بنجاح');

        //redirect to categories index

        return redirect(route('categories.index'));

    }


    public function show(Categorie $categorie)
    {
        //
    }


    public function edit($id)
    {

        $row = Categorie::findOrFail($id);

        return view('admin.categories.edit', compact('row'));

    }


    public function update(Request $request, $id)
    {

        //validate the data

        $message = [
            'title.required' => 'عفوا قم بإدخال اسم الفئة',
        ];

        $this->validate($request, [
            'title' => 'required',
        ], $message);


        //store the data and image

        $category = Categorie::find($id);

        $category->title = $request->title;

        if(isset($request->image) && $request->image != ''){

            $this->validate($request, [
               'image' => 'image'
            ]);

            $image_path = public_path().'/images/'.$category->image;

            if(file_exists($image_path)){

                unlink($image_path);

            }

            $image_name = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $image_name);

            $category->image = $image_name;

            $category->url = asset('images/'.$image_name);

        }

        $category->active = $request->active;

        $category->save();

        //set flash message

        session()->flash('edit_msg', 'تم تعديل الفئة بنجاح');

        //redirect to categories index

        return redirect(route('categories.index'));

    }


    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);

        $sub_categories = sub_category::where('category_id', $category->id)->get();

        if(count($sub_categories) > 0){

            session()->flash('unable_to_delete', 'عفوا لا يمكن حذف هذه الفئة لانها تحتوي علي تصنيفات فرعية . قم بتعديل او حذف التصنيفات الفرعية اولاً .');

            return redirect()->back();

        }

        $image_path = public_path().'/images/'.$category->image;

        if(file_exists($image_path)){

            unlink($image_path);

        }

        $category->delete();

        session()->flash('delete_msg', 'تم حذف الفئة بنجاح');

        return redirect(route('categories.index'));

    }
}
