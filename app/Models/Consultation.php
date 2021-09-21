<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor', 'visitor_id');
    }

    public function exhibitor()
    {
        return $this->belongsTo('App\Models\Visitor', 'exhibitor_id');
    }
}
