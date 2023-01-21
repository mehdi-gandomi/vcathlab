<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Features extends Enum implements LocalizedEnum
{
    const OptionOne =   0;
    const OptionTwo =   1;
    const OptionThree = 2;
}
