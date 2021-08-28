<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'business_type' => 'array',
        'business_sector' => 'array',
        'web_ads_type' => 'array',
        'mobile_ads_type' => 'array',
        'opening_ads_type' => 'array',
        'seminar_ads_type' => 'array',
        'prouduct_exhibition_ads_type' => 'array',
        'consultancy_ads_type' => 'array',
        'closing_ads_type' => 'array',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function chats()
    {
        return $this->hasMany('App\Models\Chat', 'sender_id');
    }
}
