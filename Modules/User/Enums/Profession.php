<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Profession extends Enum implements LocalizedEnum
{
    const Fellow=1;
    const MedicalStudent=2;
    const Physician=3;
    const PhysicianAssistant=4;
    const Resident=5;
    const Other=6;

}
