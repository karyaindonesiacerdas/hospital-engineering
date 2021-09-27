<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterVisitor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo('App\Models\User', 'visitor_id');
    }

    public function exhibitor()
    {
        return $this->belongsTo('App\Models\User', 'exhibitor_id');
    }
}
