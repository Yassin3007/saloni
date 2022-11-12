<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Service extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];
    protected $guarded=[];

    public function sallon(){
        return $this->belongsToMany(Sallon::class,'sallon_services',);
    }
    public function category(){
        return $this->belongsTo(Category::class ,'category_id');
    }

    public function sal_ser(){
        return $this->hasMany(Sallon_Service::class ,'service_id');
    }

}
