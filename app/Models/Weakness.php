<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weakness extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'characters_weakness');
    }
}
