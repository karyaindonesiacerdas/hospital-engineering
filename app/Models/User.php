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

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'product_interest' => 'array',
        'visit_purpose' => 'array',
        'business_nature' => 'array',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

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

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'admin_id');
    }

    public function package()
    {
        return $this->hasMany('App\Models\Post', 'admin_id');
    }
}
