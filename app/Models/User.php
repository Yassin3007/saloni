<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    /*protected $appends = [
        'profile_photo_url',
    ];*/

    public function sallon(){
        return $this->hasOne(Sallon::class,'owner_id');
    }
    public function getUserAvatar(){
        if($this->avatar==null)
            return env('DEFAULT_IMAGE_AVATAR');
        else
            return env('STORAGE_URL').'/uploads/users/'.$this->avatar;
    }

    public function scopeWithoutTimestamps()
    {
        $this->timestamps = false;
        return $this;
    }

    public function reservation(){
        return $this->hasMany(Reservation::class , 'client_id');
    }

    public function sallon_client(){
        return $this->belongsToMany(Sallon::class ,'reservations' ,'client_id' ,'sallon_id');
    }

    public function getPhotoAttribute($val){
        if($val==null)
            return asset('assets/images/avatar.png');
        else
            return asset('storage/uploads/profile/'.$val);

    }




}
