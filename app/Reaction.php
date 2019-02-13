<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = [
        'user_id', 'problem_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
