<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_service extends Model
{
    use HasFactory;
    protected $table='reservation_services';
    protected $guarded=[];
    public $timestamps=false ;
}
