<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_skill');
    }
}
