<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'problem'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function event()
    {
        return $this->belongsToMany('App\Event');
    }
    public function reaction()
    {
        return $this->hasMany('App\Reaction');
    }
}
