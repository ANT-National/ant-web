<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 0;
    case Female = 1;

    public static function toArray(): array
    {
        return [
            self::Male->value => 'Male',
            self::Female->value => 'Female',
        ];
    }
}
