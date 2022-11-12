<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin(){

        return view('front.register.admin_login');
    }

    public function login(Request $request){


        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
            return redirect()->route('adminIndex');

        }else{
            return redirect()->back();
        }



    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('home');
    }
}
