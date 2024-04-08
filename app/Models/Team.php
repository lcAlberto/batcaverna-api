<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    protected $fillable = [
        'name',
        'location',
        'image',
        'founded_date'
    ];

    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
}
