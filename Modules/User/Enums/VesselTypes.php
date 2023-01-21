<?php

namespace Modules\User\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VesselTypes extends Enum implements LocalizedEnum
{
    // const LAD_OSTIAL =   1;
    // const LAD_MID_PART =   2;
    // const LAD_DISTAL = 3;
    // const LAD_PROXIMAL = 4;
    // const LM_OSTIAL = 5;
    // const LM_DISTAL = 6;
    // const DIAGONAL_2 = 7;
    // const DIG_OSTIAL = 8;
    // const DIG_PROXIMAL = 9;

    // const OM1_OSTIAL = 10;
    // const OM1_PROXIMAL = 11;
    // const OM1_MID_PART = 12;
    // const OM1_DISTAL = 13;
    // const OM2_MID_PART = 14;
    // const OM2_PROXIMAL = 15;
    // const OM2_OSTIAL = 16;
    // const LCX_MID_PART = 17;
    // const LCX_OSTIAL = 18;

    // const PLV_OSTIAL = 19;
    // const PLV_PROXIMAL = 20;
    // const PLV_MID_PART = 21;
    // const PLV_DISTAL = 22;
    // const PDA_DISTAL = 23;
    // const PDA_MID_PART = 24;
    // const PDA_PROXIMAL = 25;

    // const RCA_OSTIAL = 26;
    // const RCA_PROXIMAL = 27;
    // const RCA_DISTAL = 28;
    // const RCA_MID_PART = 29;
    const LM= 1;
    const LAD= 2;
    const DIAGONAL_1= 3;
    const DIAGONAL_2= 4;
    const LCX= 5;
    const OM_1= 6;
    const OM_2= 7;
    const RCA= 8;
    const PLV= 9;
    const PDA= 10;
}
