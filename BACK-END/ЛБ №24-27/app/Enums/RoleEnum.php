<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum RoleEnum: int
{
    use EnumTrait;

    case CLIENT = 1;
    case DEVELOPER = 2;
    case ADMINISTRATOR = 3;

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::CLIENT => 'Клиент',
            self::DEVELOPER => 'Разработчик',
            self::ADMINISTRATOR => 'Администратор',
        };
    }
}
