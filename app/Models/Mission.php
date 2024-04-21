<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'name',
        'coordinates',
        'urgency_level',
    ];
    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'squad_mission', 'mission_id', 'squad_id');
    }
}
