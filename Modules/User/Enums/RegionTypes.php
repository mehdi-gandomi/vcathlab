<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RegionTypes extends Enum implements LocalizedEnum
{
    const OSTIAL= 1;
    const PROXIMAL= 2;
    const MID_PART= 3;
    const DISTAL= 4;
}
