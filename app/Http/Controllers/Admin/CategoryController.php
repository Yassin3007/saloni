<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'=>'required|unique:category_translations,name' ,
            'name_fr'=>'required|unique:category_translations,name' ,
        ]);

       $category= Category::create([]);
       CategoryTranslation::create([
           'category_id'=>$category->id ,
           'locale'=>'ar',
           'name'=>$request->name_ar
       ]);
        CategoryTranslation::create([
            'category_id'=>$category->id ,
            'locale'=>'fr',
            'name'=>$request->name_fr
        ]);
        return redirect()->back()->with(['success'=>'تم اضافة القسم بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        $trans= CategoryTranslation::all();
        return view('admin.editCategory',compact('category','trans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name_ar'=>'required',
            'name_fr'=>'required',
        ]);
       $name_ar = CategoryTranslation::where('category_id',$request->id)->where('locale','ar')->first();
       $name_ar->update([
           'name'=>$request->name_ar
       ]);
       $name_fr = CategoryTranslation::where('category_id',$request->id)->where('locale','fr')->first();
        $name_fr->update([
            'name'=>$request->name_fr
        ]);
        return redirect()->route('adminCategories')->with(['success'=>'category changed successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('adminCategories')->with(['success'=>'category deleted successfully']);

    }
}
