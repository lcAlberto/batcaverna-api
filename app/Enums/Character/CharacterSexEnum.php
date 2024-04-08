<?php

namespace App\Enums\Character;

use App\Enums\Enum;

abstract class CharacterSexEnum extends Enum
{
    const FEMALE = 'female';
    const MALE = 'male';
    const OTHER = 'other';
}
