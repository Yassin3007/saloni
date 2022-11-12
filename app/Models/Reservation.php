<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function services(){
        return $this->belongsToMany(Service::class,'reservation_services');
    }
    public function sallon(){
        return $this->belongsTo(Sallon::class ,'sallon_id');
    }

    public function client(){
        return $this->belongsTo(User::class ,'client_id');
    }

}
