<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum DeadlineStatusEnum: int
{
    use EnumTrait;

    case NEW = 1;
    case IN_PROCESS = 2;
    case FINISHED = 3;
    case CANCEL = 4;

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this) {
            self::NEW => 'Новый',
            self::IN_PROCESS => 'В работе',
            self::FINISHED => 'Завершен',
            self::CANCEL => 'Отменен',
        };
    }
}
