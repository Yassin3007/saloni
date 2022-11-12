<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
            'name_ar'=>'required|unique:service_translations,name' ,
            'name_fr'=>'required|unique:service_translations,name' ,
            'category_id'=>'required|exists:categories,id'

        ]);

       $service = Service::create([
            'category_id'=>$request->category_id
        ]);
       ServiceTranslation::create([
          'service_id'=>$service->id ,
           'locale'=>'ar',
           'name'=>$request->name_ar
       ]);
        ServiceTranslation::create([
            'service_id'=>$service->id ,
            'locale'=>'fr',
            'name'=>$request->name_fr
        ]);

        return redirect()->back()->with(['success'=>'تم اضافة القسم بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $trans = ServiceTranslation::all();
        $categories = Category::all();
        return view('admin.editService',compact('service','trans','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name_ar'=>'required',
            'name_fr'=>'required',
            'category_id'=>'required'
        ]);
        $name_ar = ServiceTranslation::where('service_id',$request->id)->where('locale','ar')->first();
        $name_ar->update([
            'name'=>$request->name_ar
        ]);
        $name_fr = ServiceTranslation::where('service_id',$request->id)->where('locale','fr')->first();
        $name_fr->update([
            'name'=>$request->name_fr
        ]);
        Service::find($request->id)->update([
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('adminServices')->with(['success'=>'Service changed successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect()->route('adminServices')->with(['success'=>'Service deleted successfully']);

    }
}
