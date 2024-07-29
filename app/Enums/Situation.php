<?php

namespace App\Enums;

enum Situation: int
{
    case Other = 0;
    case Graduate = 1;
    case Student = 2;
    case Employed = 3;
    case Unemployed = 4;

    public static function toArray(): array
    {
        return [
            self::Graduate->value => 'High School Graduate',
            self::Student->value => 'Student',
            self::Employed->value => 'Employed',
            self::Unemployed->value => 'Unemployed',
            self::Other->value => 'Other',
        ];
    }
}
