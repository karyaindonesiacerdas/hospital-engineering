<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'product_interest' => 'array',
        'visit_purpose' => 'array',
        'business_nature' => 'array',
    ];

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

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function chats()
    {
        return $this->hasMany('App\Models\Chat', 'sender_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function broadcasts()
    {
        return $this->hasMany('App\Models\Broadcast');
    }

    public function forums()
    {
        return $this->hasMany('App\Models\Forum');
    }

    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation', 'visitor_id');
    }

    public function banners()
    {
        return $this->hasMany('App\Models\Banner', 'exhibitor_id');
    }
}
