<?php

namespace App\Enums;
enum UserStatus: int
{
    case Active = 1;
    case Inactive = 0;
    case Banned = -1;

    public static function toArray(): array
    {
        return [
            self::Active->value => 'Active',
            self::Inactive->value => 'Inactive',
            self::Banned->value => 'Banned',
        ];
    }
}
