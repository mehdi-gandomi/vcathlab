<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Specialty extends Enum implements LocalizedEnum
{
    const GeneralCardiologist = 1;
    const InterventionalCardiologist = 2;
    const InterventionalRadilogist = 3;
    const Interventionalelectrophysiologist = 4;
    const Other = 5;
}
