<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reservation;
use App\Models\Reservation_service;
use App\Models\Sallon;
use App\Models\Sallon_Service;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $request->validate([
            'city_id'=>'required',
            'service_id'=>'required'
        ]);


            $service = Service::find($request->service_id);

            $price = Sallon_Service::where('service_id',$request->service_id)->get();

            $sallons = $service->sallon->where('city_id',$request->city_id)->where('is_active',1);


            return  view('front.search.search',compact('sallons','service','price')) ;






    }


    public function sallon_profile($id){


        $sallon= Sallon::find($id);

        $photos = $sallon->images ;

        $services = $sallon->services ;

        $prices= Sallon_Service::where('sallon_id',$sallon->id)->get() ;


        $categories = Category::all();


        $comments = Comment::where('sallon_id',$id)->get();


        return view('front.search.sallon_profile',compact('sallon','photos','prices','services','categories','comments'));

    }


}
