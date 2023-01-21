<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Sex extends Enum implements LocalizedEnum
{
    const MALE =   1;
    const FEMALE =   0;
}
