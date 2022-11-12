<?php

namespace App\Http\Controllers\Front;

use App\Charts\test;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Client;
use App\Models\Copoun;
use App\Models\Reservation;
use App\Models\Sallon;
use App\Models\Sallon_Image;
use App\Models\Sallon_Service;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ClientController extends Controller
{
    public function profile(){
        $client = \App\Models\User::find(auth()->user()->id);
        $sallon= $client->sallon ;

        if ($client->is_owner == 1){
            if (! $client->sallon){
                return redirect()->route('sallonData');
            }
            if ($client->sallon->is_active==0){
                return redirect()->route('wait');
            }else {
                if(! Sallon_Service::where('sallon_id',$sallon->id)->first() ){
                    return redirect()->route('add_services');
                }

                return redirect()->route('clientIndex');
            }
        }
        else{
            return redirect()->route('userIndex');
        }

    }

    public function add_services(){
        $categories = Category::all();
        return view('front.client.add_services',compact('categories'));
    }


    public function index(){

        $sallon = auth()->user()->sallon ;
        $service_count =$sallon->services->count();
        $count = count(Client::where('sallon_id',$sallon->id)->distinct()->get());


        return view('front.client.dashboard',compact('count','sallon','service_count'));
    }

    public function reservation(){
        $client = auth()->user();
        $sallon  =$client->sallon ;
        $reservations = Reservation::where('sallon_id',$sallon->id)->orderBy('id','desc')->get();


        return view('front.client.Reservations' , compact('reservations','sallon'));
    }

    public function cities(){
        $cities = City::all();
        $city_trans =CityTranslation::all();
        return view('front.client.cities',compact('cities','city_trans'));
    }

    public function services(){
        $client = auth()->user() ;
        $sallon = $client->sallon ;
        $categories = Category::all();
        $services = $sallon->services;


        return view('front.client.services',compact('services','categories','sallon'));
    }

    public function selectServices(Request $request){



        $id= $request->service;
        if ($id) {

            foreach ($id as $idd) {

                $request->validate([
                    str_replace(' ', '', Service::find($idd)->name) => 'required',
                    'service' => 'required'
                ]);


            }
            $price = $request->price ;

            $client =auth()->user() ;
            $sallon= $client->sallon ;
            for ($i=0 ;$i<count($id);$i++){
                $name =str_replace(' ','',Service::find($id[$i])->name)  ;
                Sallon_Service::create([
                    'sallon_id'=>$sallon->id ,
                    'service_id'=>$id[$i] ,
                    'price'=>$request->$name

                ]);
            }
            $client_id = auth()->user()->id ;


            return redirect()->route('profile',$client_id);
        }
        else{
            return redirect()->back()->with(['error'=>'you must at least check one service']);
        }

    }

    public function addNewServices( Request $request){
        $id= $request->service;
        if ($id) {

            foreach ($id as $idd) {

                $request->validate([
                    str_replace(' ', '', Service::find($idd)->name) => 'required',
                    'service' => 'required'
                ]);


            }
            $price = $request->price ;

            $client =auth()->user() ;
            $sallon= $client->sallon ;
            for ($i=0 ;$i<count($id);$i++){
                $name =str_replace(' ','',Service::find($id[$i])->name)  ;
                Sallon_Service::create([
                    'sallon_id'=>$sallon->id ,
                    'service_id'=>$id[$i] ,
                    'price'=>$request->$name

                ]);
            }
            $client_id = auth()->user()->id ;


            return redirect()->route('clientSetting',$client_id);
        }
        else{
            return redirect()->back()->with(['error'=>'you must at least check one service']);
        }


    }

    public function deleteServices(Request $request){
        $client = auth()->user();
        $sallon =$client->sallon ;
        foreach ($request->serve as $service){
            Sallon_Service::where('sallon_id',$sallon->id)->where('service_id',$service)->delete();
        }

        return redirect()->back()->with(['success'=>'services deleted successfully']);
    }

    public function add_service_price(){
        $client =auth()->user() ;
        $sallon= $client->sallon ;
        $services =Sallon_Service::where('sallon_id',$sallon->id)->get();
        return view('front.client.add_service_price',compact('sallon'));
    }
    public function categories(){
        $categories = Category::all();
        $category_trans=CategoryTranslation::all();
        return view('front.client.categories',compact('categories','category_trans'));
    }

    public function copouns(){
        $client =auth()->user();
        $sallon = $client->sallon ;
        $copouns = $sallon->copouns ;
        return view('front.client.Copouns',compact('copouns','sallon'));
    }
    public function addCopoun(Request $request){
        $request->validate([
           'name'=>'required',
           'discount'=>'required',
           'start_at'=>'required',
           'end_at' =>'required'
        ]);
        $client = auth()->user();
        $sallon= $client->sallon ;

        Copoun::create([
           'sallon_id'=>$sallon->id ,
           'name'=>$request->name ,
           'discount'=>$request->discount*.01 ,
           'start_at'=>$request->start_at,
           'end_at'=>$request->end_at,
            'is_active'=>1,
            'count'=>0
        ]);
        return redirect()->back()->with(['success'=>'Copoun is added successfully']);
    }

    public function setting($id){
        $client = User::find($id);
        $sallon = $client->sallon ;
        $cities = City::all();
        $categories = Category::all();
        $services = $sallon->services ;
        return view('front.client.Settings',compact('client' ,'sallon','services','cities','categories'));
    }

    public function updateClientInformation(Request $request){

        $request->validate([
            'name'=>'required|unique:users,name,'.$request->id ,
            'email'=>'required|email|unique:users,email,'.$request->id,
            'phone'=>'required|numeric|unique:users,phone,'.$request->id,

            'type'=>'required',
        ]);

        $client =User::find($request->id);
        $client->update([
           'name'=>$request->name ,
           'email'=>$request->email ,
           'phone'=>$request->phone ,
           'type'=>$request->type
        ]);

        return redirect()->back();
    }

    public function updateSallonInformation(Request $request){

        $request->validate([
            'name'=>'required|unique:sallons,name,'.$request->id ,
            'phone'=>'required|unique:sallons,phone_number,'.$request->id ,
            'address'=>'required',
            'description'=>'required',


        ]);
        $client = auth()->user();
        $sallon =$client->sallon ;
        $sallon->update([
            'name'=>$request->name ,
            'phone_number'=>$request->phone ,
            'address'=>$request->address ,
            'description'=>$request->description ,
            'open_at'=>$request->open_at ,
            'close_at'=>$request->close_at ,

            'city_id'=>$request->city_id
        ]);
        if (isset($request->rest_start)){{
            $sallon->update([
                'rest_start'=>$request->rest_start ,
                'rest_end'=>$request->rest_end ,
            ]);
        }}
        if (!empty( $request->photos )){
            Sallon_Image::where('sallon_id',$sallon->id)->delete();
            foreach ($request->photos as $photo){
                $fileName = uploadImage('sallons', $photo);
                Sallon_Image::create([
                   'image'=>$fileName,
                    'sallon_id'=>$sallon->id
                ]);
            }
            $sallon->update([
                'image'=>$fileName
            ]);
        }
        return redirect()->back()->with(['success'=>'sallon information updated successfully']);
    }

    public function users(){

        $sallon= auth()->user()->sallon ;

        $clients = Client::where('sallon_id',$sallon->id)->distinct()->get();

        $count = count(Client::where('sallon_id',$sallon->id)->distinct()->get());



        return view('front.client.Users',compact('clients','count'));
    }

    public function guide(){
        return view('front.client.Guides');
    }


}
