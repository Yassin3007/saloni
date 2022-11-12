<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Mail\ReservationMail;
use App\Models\Client;
use App\Models\Copoun;
use App\Models\Reservation;
use App\Models\Reservation_service;
use App\Models\Sallon;
use App\Models\Sallon_Service;
use App\Models\Tax;
use App\Models\User;
use App\Models\Value;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    // 0=>wait to accept
    // 1=>accepted
    // 2=>complete reservation
    // 3=>refused


    public function add_reservation(Request $request){


        $request->validate([
            'service'=>'required'
        ]);
        $sallon =Sallon::find($request->id);
        $services = $request->service ;
        $sum = 0 ;
        foreach ($services as $service){
            $price = Sallon_Service::where('sallon_id',$sallon->id)->where('service_id',$service)->first()->price ;
            $sum = $sum +$price ;
        }
       // return redirect()->route('submitReservation');

        return view('front.search.submitReservation',compact('services' ,'sum','sallon')) ;

    }



    public function send_reservation(Request $request){

        $request->validate([
            'day'=>'required',
            'time'=>'required',


        ]);
        $client=auth()->user();
        DB::beginTransaction();
        $reservation = Reservation::create([
            'sallon_id'=>$request->sallon_id ,
            'client_id'=>$client->id ,
            'price'=>$request->total ,
            'date'=>$request->day ,
            'time'=>$request->time ,
            'status'=>0,
            'code'=>mt_rand(100000,999999),
        ]);

        if (isset($request->copon)){
            $request->validate([
                'copon'=>'exists:copouns,name'
            ]);
           $copon = Copoun::where('name',$request->copon)->first();
            $today = Carbon::now()->format('Y-m-d');
           if ($today < $copon->end_at ) {
               $reservation->update([
                   'price' => $request->total - $request->total * $copon->discount
               ]);
           }else{
               return redirect()->back()->with(['error'=>'this copon is expired']);
           }

        }
        Client::create([
           'sallon_id'=>$request->sallon_id ,
            'client_id'=>auth()->user()->id
        ]);
        $details = [
            'title'=>'your Complete Reservation code is ',
            'code'=>$reservation->code,
            'name'=>$client->name
        ];
        Mail::to($client->email)->send(new ReservationMail($details));

        foreach ($request->services as $service) {
            Reservation_service::create([
                'reservation_id' => $reservation->id,
                'service_id' => $service
            ]);
        }
      DB::commit();
        return redirect()->route('profile');

    }

    public function accept_reservation($id){
        $reservation =Reservation::find($id);
        $reservation->update([
            'status'=>1
        ]);
        return redirect()->back()->with(['success'=>'the request accepted successfully']);
    }


    public function refuse_reservation($id){
        $reservation =Reservation::find($id);
        $reservation->update([
            'status'=>3
        ]);
        return redirect()->back()->with(['success'=>'the request accepted successfully']);
    }

    public function verify_reservation($id){


        return view('front.client.complete_reservation',compact('id'));
    }

    public function complete_reservation(Request $request){
        $client = auth()->user();

        $reservation =Reservation::find($request->id);
        $user= $reservation->client;
        $sallon = $client->sallon;
        $values = Value::find(1);
        $tax= $sallon->tax ;
        $user->update([
            'points'=>$user->points +$values->loyalty
        ]);

        $invitor = User::find($user->invitor_id);
        $invitor->update([
            'points'=>$invitor->points + $values->referral
        ]);



        if ($request->code == $reservation->code) {
            $reservation->update([
                'status' => 2
            ]);
            $count = count($sallon->reservations);
            if ($count < $values->level_1){
                $sallon->update([
                    'level'=>1
                ]);
            }elseif ($count > $values->level_1 && $count < $values->level_2){
                $sallon->update([
                    'level'=>2
                ]);
            }
            elseif ($count > $values->level_2 && $count < $values->level_3){
                $sallon->update([
                    'level'=>3
                ]);
            }
            else{
                $sallon->update([
                    'level'=>4
                ]);
            }

            $price =$reservation->price ;
            if ($sallon->level == 1){
                $tax->update([
                    'tax'=>$reservation->price *$values->tax_1
                ]);
            }
            elseif ($sallon->level == 2){
                $tax->update([
                    'tax'=>$reservation->price *$values->tax_2
                ]);
            }
            elseif ($sallon->level == 1){
                $tax->update([
                    'tax'=>$reservation->price *$values->tax_3
                ]);
            }else{
                $tax->update([
                    'tax'=>$reservation->price *$values->tax_4
                ]);
            }
            $client->update([
                'write'=>1
            ]);


            return redirect()->route('clientReservations')->with(['success'=>'the request accepted successfully']);

        }else{
            return redirect()->back()->with(['error'=>'the code is incorrect']);
        }
    }

}
