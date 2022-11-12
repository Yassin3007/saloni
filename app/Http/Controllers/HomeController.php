<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function savePhoto(Request $request){


        $request->validate([
           'photo'=>'required'
        ]);
        $fileName = uploadImage('profile', $request->photo);

        $user = auth()->user();
        $user->photo =$fileName ;
        $user->save();

        return redirect()->back()->with(['success'=>'profile picture changed successfully']);


    }

    public function saveAdminPhoto(Request $request){


        $request->validate([
            'photo'=>'required'
        ]);
        $fileName = uploadImage('profile', $request->photo);

        $user = auth('admin')->user();
        $user->photo =$fileName ;
        $user->save();

        return redirect()->back()->with(['success'=>'profile picture changed successfully']);


    }
}
