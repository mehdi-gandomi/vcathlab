<?php

namespace Modules\Admin\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ComplexCaseStatuses extends Enum implements LocalizedEnum
{
    const INIT =   0;
    const ACTIVE =   1;
    const DEACTIVE = 2;
}
