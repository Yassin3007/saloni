<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected  $guarded=[];
    public function getPhotoAttribute($val){
        if($val==null)
            return asset('assets/images/profile.png');
        else
            return asset('storage/uploads/profile/'.$val);

    }
}
