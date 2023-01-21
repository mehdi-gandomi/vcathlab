<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TrialIntervals extends Enum implements LocalizedEnum
{
    const MONTH =   "month";
    const YEAR =   "year";
}
