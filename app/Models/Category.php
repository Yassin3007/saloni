<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Category extends Model
{
    use HasFactory;
    use Translatable ;


    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];
    protected $guarded=[];

    public function services(){
        return $this->hasMany(Service::class , 'category_id');
    }



}
