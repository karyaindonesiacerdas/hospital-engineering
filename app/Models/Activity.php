<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function causer()
    {
        return $this->belongsTo('App\Models\User', 'causer_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\User', 'subject_id');
    }
}
