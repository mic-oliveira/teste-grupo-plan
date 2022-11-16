<?php

use App\Interfaces\EnumWithListsInterface;
use App\Traits\EnumListsTrait;

enum VoltageEnum: int implements EnumWithListsInterface
{
    use EnumListsTrait;

    case AC110 = 110;
    case AC220 = 220;
}
