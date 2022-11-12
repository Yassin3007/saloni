<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Sallon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment(Request $request){





            $request->validate([
                'comment'=>'required'
            ]);

            $comment = Comment::create([
                'comment'=>$request->comment ,
                'comment_writer'=>auth()->user()->name ,
                'sallon_id'=>$request->sallon_id
            ]);



            if (isset($request->rate)){
                $comment->update([
                    'rate'=>$request->rate
                ]);
                $rate = (Comment::sum('rate'))/(Comment::count('rate'));


                $sallon = Sallon::find($request->sallon_id);


                $sallon->update([
                    'rating'=>$rate
                ]);


            }

            return redirect()->back();



    }
}
