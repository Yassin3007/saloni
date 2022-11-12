<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\City;
use App\Models\CityTranslation;
use App\Models\Reservation;
use App\Models\Sallon;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\User;
use App\Models\Value;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdminController extends Controller
{
    public function index(){
        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options([]);
        return view('admin.dashboard',compact('chartjs'));
    }

    public function reservation(){
        $reservations  =Reservation::all();
        return view('admin.Reservations',compact('reservations'));
    }

    public function cities(){
        $cities = City::all();
        $city_trans =CityTranslation::all();
        return view('admin.cities',compact('cities','city_trans'));
    }

    public function services(){
        $categories = Category::all();
        $services = Service::all();
        $service_trans = ServiceTranslation::all();

        return view('admin.services',compact('services','categories','service_trans'));
    }
    public function categories(){
        $categories = Category::all();
        $category_trans=CategoryTranslation::all();
        return view('admin.categories',compact('categories','category_trans'));
    }

    public function copouns(){
        return view('admin.Copouns');
    }
    public function settings(){
        $admin = auth('admin')->user() ;
        $values = Value::find(1);

        return view('admin.Settings',compact('admin','values'));
    }

    public function editAdminInformation(Request $request){
        $request->validate([
           'name'=>'required|unique:admins,name,'.$request->id,
           'email'=>'required|unique:admins,email,'.$request->id,


        ]);

        $admin= Admin::find($request->id);
        $admin->update([
           'name'=>$request->name,
           'email'=>$request->email ,

        ]);
        if (isset($request->password)){
            $admin->update([
                'password'=>bcrypt($request->password)
            ]);
        }
        return redirect()->back()->with(['success'=>'admin credentials changed successfully']);
    }
    public function editApp(Request $request){

        $values= Value::find(1);
        $values->update([
           'tax_1'=>$request->tax_1,
           'tax_2'=>$request->tax_2,
           'tax_3'=>$request->tax_3,
           'tax_4'=>$request->tax_4,
            'level_1'=>$request->level_1,
            'level_2'=>$request->level_2,
            'level_3'=>$request->level_3,
            'level_4'=>$request->level_4,
            'loyalty'=>$request->loyalty,
            'referral'=>$request->referral,
            'about'=>$request->about,
            'privacy'=>$request->privacy

        ]);
        return redirect()->back()->with(['success'=>'data changed successfully']);
    }

    public function sallons(){
        $sallons = Sallon::where('is_active',0)->get();
        return view('admin.Salon',compact('sallons'));
    }
    public function checkContract($x){
        return view('checkPhoto',compact('x'));
    }
    public function checkCommercial($x){

        return view('checkPhoto',compact('x'));
    }

    public function ActiveSallons(){
        $tax= Value::find(1)->tax ;
        $x= 0 ;
        $sallons = Sallon::all();
        $values = Value::find(1);
        return view('admin.active_sallons',compact('sallons','tax','values'));
    }

    public function activeSallon($id){
        $sallon= Sallon::find($id);
        $sallon->is_active=1;
        $sallon->save();
        return redirect()->back();
    }
    public function disableSallon($id){
        $sallon= Sallon::find($id);
        $sallon->is_active=0;
        $sallon->save();
        return redirect()->back();
    }

    public function users(){
        $users = User::all();
        return view('admin.Users',compact('users'));
    }

    public function activeUser($id){
        $user = User::find($id);
        $user->is_active=1;
        $user->save();
        return redirect()->back();
    }
    public function disableUser($id){
        $user= User::find($id);
        $user->is_active=0;
        $user->save();
        return redirect()->back();
    }
    public function changeAdminPassword(Request $request){
        $request->validate([
            'password'=>'confirmed'
        ]);
        $client = \App\Models\Admin::find($request->id);
        $client->update([
            'password'=>bcrypt($request->password)
        ]);
        return redirect()->back()->with(['success'=>'password changed successfully']);
    }


}
