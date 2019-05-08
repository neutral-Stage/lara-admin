<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'expired_date', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function problem()
    {
        return $this->hasMany('App\Problem','event_id');
    }
}
