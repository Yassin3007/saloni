<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user= auth()->user();
        $reservations =$user->reservation ;
        return view('front.user.dashboard',compact('user','reservations'));
    }

    public function reservations(){
        $user = auth()->user() ;
        $reservations =$user->reservation ;

        return view('front.user.Reservations',compact('reservations','user'));
    }
    public function deleteReservation($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with(['success'=>'reservtion deleted successfully']);

    }

    public function settings(){
        $client = auth()->user();
        return view('front.user.settings',compact('client'));
    }

    public function updateUserInformation(Request $request){
        $request->validate([
            'name'=>'required|unique:users,name,'.$request->id ,
            'email'=>'required|email|unique:users,email,'.$request->id,
            'phone'=>'required|numeric|unique:users,phone,'.$request->id,

            'type'=>'required',
        ]);
        $client = \App\Models\User::find($request->id);
        $client->update([
            'name'=>$request->name ,
            'email'=>$request->email ,
            'phone'=>$request->phone ,
            'type'=>$request->type
        ]);

        return redirect()->back();
    }

    public function changePassword(Request $request){
       $request->validate([
           'password'=>'confirmed'
       ]);
       $client = \App\Models\User::find($request->id);
       $client->update([
          'password'=>bcrypt($request->password)
       ]);
       return redirect()->back()->with(['success'=>'password changed successfully']);
    }

    public function guide(){
        return view('front.user.Guides');
    }
}
