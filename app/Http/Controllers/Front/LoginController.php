<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\City;
use App\Models\Client;
use App\Models\Sallon;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function sendMail(){
        $details = [
            'title'=>'hbhhh',
            'body'=>'dfvdfvfdbfgdbgfbgfbgfbfgbfgbgfbfb'
        ];
        Mail::to('aneysz31@gmail.com')->send(new RegisterMail($details));

        return 'email sent';
    }
    public function userAuth($code){
        return view('front.register.sign_in',compact('code'));
    }

    public function userRegister(Request $request){



        $request ->validate([
            'name'=>'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric|unique:users,phone',
            'password'=>'required|min:8|confirmed',
            'type'=>'required',
        ]);




        User::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'is_owner'=>$request->type,
            'is_active'=>0,
            'code'=>mt_rand(100000,999999),
            'password'=>Hash::make($request->password),
        ]);
        $client = User::latest()->first();

        $details = [

            'title'=>'your verification code is ',
            'code'=>$client->code,
            'name'=>$client->name
        ];
        Mail::to($client->email)->send(new RegisterMail($details));
        $invitor = User::where('code',$request->code)->first();
        if($invitor){
            $client->update([
                'invitor_id'=>$invitor->id
            ]);
        }


        if(auth()->guard()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])||
            auth()->guard()->attempt(['phone' => $request->input("email"), 'password' => $request->input("password")])) {

                return redirect() -> route('active_mail')->with(['success'=>'تم تسجيل الدخول بنجاح']);

            }

    }
    public function active_mail(){
        return view('front.register.code');
    }

    public function confirmCode(Request $request){
        $client = User::find($request->user_id);
        if ($request->code ==$client->code){
            $client->update([
                'is_active'=>1
            ]);
            if ($client->is_owner==0) {
                return redirect()->route('userIndex')->with(['success' => 'تم تفعيل الايميل بنجاح']);
            }else{
                return redirect()->route('sallonData')->with(['success' => 'تم تفعيل الايميل بنجاح']);
            }
        }
        else{
            return redirect()->back()->with(['error'=>'الكود الذى ادخلته غير صحيح']);
        }
    }

    public function sallonData(){
        $cities =City::all();
        return view('front.client.add_sallon_information',compact('cities'));
    }

    public function addSalonInformation(Request $request){
        $request->validate([
            'sallon_name'=>'required|unique:sallons,name',
            'phone_number'=>'required|unique:sallons,phone_number',
            'address'=>'required',
            //'city'=>'required',
            'description'=>'required',
            'open_at'=>'required',
            'close_at'=>'required',

            'rent_contract'=>'required',
            'commercial_register'=>'required'

        ]);


        $client =auth()->user()->id ;
        DB::beginTransaction(); ;

        $data = Sallon::create([
            'name'=>$request->sallon_name ,
            'phone_number'=>$request->phone_number ,
            'address'=>$request->address ,
            'owner_id'=>$client  ,
            'city_id'=>$request->city ,
            'description'=>$request->description,
            'open_at'=>$request->open_at,
            'close_at'=>$request->close_at,

            'is_active'=>0,
            'rating'=>0,
        ]);

        $sallon = Sallon::where('phone_number',$request->phone_number)->first() ;


        Tax::create([
            'sallon_id'=>$sallon->id
        ]);

        $rent_contract = uploadImage('sallons', $request->rent_contract);
        $commercial_register = uploadImage('sallons', $request->commercial_register);
        $sallon->rent_contract =$rent_contract ;
        $sallon->commercial_register =$commercial_register ;
        $sallon->save();

        DB::commit();

        return redirect()->route('wait')
            ->with(['success'=>'تمت اضافة بيناتات الصالون بنجاح , برجاء الانتظار حتي يتم الموافقة عليه']);
    }
    public function wait(){
        return view('front.client.wait');
    }

    public function userLogin(Request $request){

        $remember_me = $request->has('remember_me');

        if (auth()->guard()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            $client = User::where('email',$request->email)->first();

            if ($client->is_owner == 0) {
                return redirect()->route('userIndex')->with(['success' => 'تم تسجيل الدخول بنجاح']);

            } elseif ($client->is_owner == 1) {
                if (! $client->sallon){
                    return redirect() -> route('sallonData')->with(['success'=>'تم تسجيل الدخول بنجاح']);
                }
                else {
                    return redirect()->route('clientIndex')->with(['success' => 'تم تسجيل الدخول بنجاح']);

                }


            }



        }
        else{
            return redirect()->route('home')->with(['error' => 'هناك خطا بالبيانات']);
        }




    }
    public function userLogout(){

        auth()->guard()->logout();
        return redirect()->route('home');
    }

    public function add_sallon_information(){
        return view('front.client.Settings');
    }
}
