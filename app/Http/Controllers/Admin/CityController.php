<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityTranslation;
use Illuminate\Http\Request;

class CityController extends Controller
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
           'name_ar'=>'required|unique:city_translations,name' ,
           'name_fr'=>'required|unique:city_translations,name' ,
        ]);

        $city = City::create([]);
        CityTranslation::create([
            'city_id'=>$city->id ,
            'locale'=>'ar',
            'name'=>$request->name_ar
        ]);
        CityTranslation::create([
            'city_id'=>$city->id ,
            'locale'=>'fr',
            'name'=>$request->name_fr
        ]);
        return redirect()->back()->with(['success'=>'تم اضافة المدينة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $city = City::find($id);
        $trans = CityTranslation::all();
        return view('admin.editCity',compact('city','trans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'city_ar'=>'required',
            'city_fr'=>'required',
        ]);

        $name_ar = CityTranslation::where('city_id',$request->id)->where('locale','ar')->first();
        $name_ar->update([
            'name'=>$request->city_ar
        ]);
        $name_fr = CityTranslation::where('city_id',$request->id)->where('locale','fr')->first();
        $name_fr->update([
            'name'=>$request->city_fr
        ]);
        return redirect()->route('adminCities')->with(['success'=>'category changed successfully']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id)->delete();
        return redirect()->route('adminCities')->with(['success'=>'category changed successfully']);

    }
}
