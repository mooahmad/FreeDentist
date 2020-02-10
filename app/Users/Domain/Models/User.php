<?php

namespace App\Users\Domain\Models;

use App\Cities\Domain\Models\City;
use App\Followers\Domain\Models\Follower;
use App\Nationality\Domain\Models\Nationality;
use Artify\Artify\Traits\Roles\Roles;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lexx\ChatMessenger\Traits\Messagable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, Roles, Messagable;

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile', 'email', 'password', 'admin', 'gender', 'nationality', 'otp', 'birthdate', 'api_token', 'city_id'
    ];

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
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne(Nationality::class, 'id','nationality');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function followers()
    {
        return $this->hasMany(Follower::class);
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
        return $this->where(['admin' => '2', 'active' => '1']);
    }
    public function scopeAdmin($query)
    {
        return $query->where(['admin' => '2']);
    }
    public function hasOTP($value)
    {
        return $this->otp === $value;
    }
    public function scopeWithOTP($query, $value)
    {
        return $query->where('otp', $value);
    }
}
