<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sallon extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    protected $table = 'sallons';

    public function services(){
        return $this->belongsToMany(Service::class,'sallon_services',);
    }

    public function owner(){
        return $this->belongsTo(Client::class ,'owner_id');
    }

    public function city(){
        return $this->belongsTo(City::class ,'city_id');
    }

    public function image(){
        if($this->image==null)
            return asset('assets/images/logo.png');
        else
            return env("STORAGE_URL")."/uploads/sallons/".$this->image;
    }

    public function getImageAttribute($val){
        if($val==null)
            return asset('assets/images/image.jpg');
        else
            return asset('storage/uploads/sallons/'.$val);

    }

    public function clients(){
        return $this->belongsToMany(User::class ,'reservations','sallon_id','client_id');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class ,'sallon_id');
    }

    public function tax(){
        return $this->hasOne(Tax::class ,'sallon_id');
    }
    public function copouns(){
        return $this->hasMany(Copoun::class ,'sallon_id');
    }
    public function images(){
        return $this->hasMany(Sallon_Image::class ,'sallon_id');
    }


}
