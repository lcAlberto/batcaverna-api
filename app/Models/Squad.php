<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $fillable = [
        'name',
        'description',
        'objectives',
    ];

    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'squad_mission', 'squad_id', 'mission_id');
    }
}
