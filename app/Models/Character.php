<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'codename',
        'sex',
        'age',
        'avatar',
        'weakness',
        'color',
        'affiliate',
        'pair',
        'planet',
        'city',
        'team_id',
        'squad_id'
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function squad()
    {
        return $this->belongsTo('App\Models\Squad');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'character_skill');
    }
}
