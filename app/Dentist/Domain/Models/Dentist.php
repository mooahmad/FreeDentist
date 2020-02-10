<?php

namespace App\Dentist\Domain\Models;

use App\Cities\Domain\Models\City;
use App\Followers\Domain\Models\Follower;
use App\Hospital\Domain\Models\Hospital;
use App\Nationality\Domain\Models\Nationality;
use Artify\Artify\Traits\Roles\Roles;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Dentist extends Authenticatable implements JWTSubject
{
    use Notifiable, Roles;

    protected $table = 'dentists';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile', 'email', 'password', 'gender', 'nationality', 'birthdate', 'photo', 'profile_photo', 'hospital', 'dgree', 'nation_id', 'city_id', 'otp'
        , 'code', 'device_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne(Nationality::class, 'id', 'nationality');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function followers()
//    {
//        return $this->hasMany(Follower::class);
//    }

    public function hospital(){
        return $this->belongsto(Hospital::class,'hospital');
    }
        /**
         * Get the identifier that will be stored in the subject claim of the JWT.
         *
         * @return mixed
         */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function generateAuthToken()
    {
        return \JWTAuth::fromUser($this);
    }

    public function isActivated()
    {
        return $this->where('active', 1);
    }

    public function hasOTP($value)
    {
        return $this->otp === $value;
    }
}
