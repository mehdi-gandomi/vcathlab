<?php

namespace Modules\User\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Models\MaceAssesment;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use App\Models\User;

class MaceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        ['HbA1C' => $HbA1C, 'LDL_cholesterol' => $LDL_cholesterol, 'HDL_cholesterol' => $HDL_cholesterol, 'Age' => $Age, 'SBP' => $SBP, 'Triglycerides' => $Triglycerides, 'DBP' => $DBP, 'Heigth' => $Heigth, 'Weigth' => $Weigth, 'Sex' => $Sex, 'Smoker' => $Smoker, 'TBP' => $TBP, 'MI' => $MI, 'Diabetes' => $Diabetes, 'FH' => $FH, 'THL' => $THL] = $data;
        if ((auth()->check() && auth()->user()->panel_type == 6) || ($request->bearerToken() && auth("sanctum")->user() && auth("sanctum")->user()->panel_type == 6)) {
            ['LeftAnklePressure' => $LeftAnklePressure, 'RightAnklePressure' => $RightAnklePressure] = $data;
        }
        $dataToSave = $request->only([
            'HbA1C',
            'LDL_cholesterol',
            'HDL_cholesterol',
            'Age',
            'SBP',
            'Triglycerides',
            'DBP',
            // 'LeftAnklebrachialIndex',
            // 'RightAnklebrachialIndex',
            'Heigth',
            'Weigth',
            'Sex',
            'Smoker',
            'TBP',
            'MI',
            'Diabetes',
            'FH',
            'THL',
            'risk_factors',
            'history',
            'physical_activity',
            'drug_information',
            'patient_id',
            'symptom'
            // 'Parental_hypertension'
        ]);
        if ($request->bearerToken()) {
            ['LeftAnklePressure' => $LeftAnklePressure, 'RightAnklePressure' => $RightAnklePressure] = $data;
            $dataToSave['user_id'] = auth("sanctum")->user() ? auth("sanctum")->user()->id : User::find(46)->id;
            $LeftAnklebrachialIndex = $LeftAnklePressure / $SBP;
            $RightAnklebrachialIndex = $RightAnklePressure / $SBP;
        }
        if (auth()->check()) {
            $dataToSave['user_id'] = auth()->user()->id;
        }
        $symptom = $request->get("symptom");
        if ((auth()->check() && auth()->user()->panel_type == 6)) {
            $LeftAnklebrachialIndex = $LeftAnklePressure / $SBP;
            $RightAnklebrachialIndex = $RightAnklePressure / $SBP;
        } else if (!$request->bearerToken()) {
            $LeftAnklebrachialIndex = 1.04;
            $RightAnklebrachialIndex = 1.04;
        }
        $dataToSave['LeftAnklebrachialIndex'] = $LeftAnklebrachialIndex;
        $dataToSave['RightAnklebrachialIndex'] = $RightAnklebrachialIndex;
        if (isset($LeftAnklePressure)) {
            $dataToSave['LeftAnklePressure'] = $LeftAnklePressure;
        }
        if (isset($RightAnklePressure)) {
            $dataToSave['RightAnklePressure'] = $RightAnklePressure;
        }
        $Parental_hypertension = isset($data['Parental_hypertension']) ? $data['Parental_hypertension'] : null;
        $dataToSave['Parental_hypertension'] = $Parental_hypertension;
        if ($request->get("id")) {
            $mace = MaceAssesment::find($request->get("id"));
            $mace->update($dataToSave);
            $mace = $mace->fresh();
        } else {
            $mace = MaceAssesment::firstOrCreate($dataToSave);
        }
        $Total_cholesterol = $LDL_cholesterol + $HDL_cholesterol + ($Triglycerides / 5);

        $ABI = ($LeftAnklebrachialIndex + $RightAnklebrachialIndex) / 2;




        $Ken = ($Age * 0.0455) + ($Sex * 0.7496)  + ($Diabetes * 0.5168) + ($Smoker * 0.4732) + ($Total_cholesterol * 0.0053) - ($HDL_cholesterol * 0.0140) + ($THL * 0.2473) + ($SBP * 0.0085) + ($TBP * 0.3381) + ($FH * 0.4522);
        $Kmen = (1 - pow(0.99963, exp($Ken))) * 100;


        $Wen = ($Age * 0.0455) + ($Sex * 0.7496) + ($Diabetes * 0.5168) + (0 * 0.4732) + (130 * 0.0053) - (55 * 0.0140) + ($THL * 0.2473) + (120 * 0.0085) + ($TBP * 0.3381) + ($FH * 0.4522);
        $OMen = (1 - pow(0.99963, exp($Wen))) * 100;
        $B1 = 0.0799 * $Age + 3.137 * log($SBP) + 0.180 * log(0.1) + 1.382 * log($Total_cholesterol);

        $B2 = -1.172 * log($HDL_cholesterol) + 0.134 * $HbA1C + 0.818 * $Smoker + 0.438 * $MI;

        $B = $B1 + $B2;
        $RSK = (1 - pow(0.98634, exp($B - 22.325))) * 100;


        // $c1 = 0.0799 * $Age + 3.137 * log(120) + 0.180 * log(0.1) + 1.382 * log(150);

        // $c2 = -1.172 * log(55) + 0.134 * 5 + 0.818 * 0 + 0.438 * $MI;

        // $c = $c1 + $c2;$RSK1 = (1 - pow(0.98634, exp($c - 22.325))) * 100;

        $c1 = 0.0799 * $Age + 3.137 * log(120) + 0.180 * log(0.1) + 1.382 * log(150);

        $c2 = -1.172 * log(40) + 0.134 * 6 + 0.818 * 0 + 0.438 * $MI;

        $c = $c1 + $c2;
        $RSK1 = (1 - pow(0.98634, exp($c - 22.325))) * 100;


        $PWV = ((0.12 * $Age) + 8) * 100;

        $ASI = ($PWV / 50) * ($DBP / 70) * ($ABI / 0.8); //Arterial Stiffness Index (ASI)



        // $Risk1 = $Kmen + ((0.035*$Weigth)-1.4)+((0.175*$ASI)-7.65);


        // $Risk2 = $RSK + ((0.035*$Weigth)-1.4)+((0.175*$ASI)-7.65);
        $Risk1 = $Kmen;
        $Risk2 = $RSK;

        $msg = "";
        if ($Risk1 < 5) {
            $msg = "Low risk";
        } else if ($Risk1 < 20 && $Risk1 > 5) {
            $msg = "Moderate risk";
        } else if ($Risk1 > 20) {
            $msg = "High risk";
        }
        $msg2 = "";
        if ($Risk2 < 5) {
            $msg2 = "Low risk";
        } else if ($Risk2 < 20 && $Risk2 > 5) {
            $msg2 = "Moderate risk";
        } else if ($Risk2 > 20) {
            $msg2 = "High risk";
        }

        //new
        if ((auth()->check() && auth()->user()->panel_type == 6) || $request->has("get_new_words")) {
            if ($Sex == 1)
                $PTPsexx_point = 1;
            if ($Sex == 0)
                $PTPsexx_point = -1;

            if ($symptom == "Typical Chest Pain")
                $PTPsymptom_point = 2;

            if ($symptom == "Atypical Chest Pain")
                $PTPsymptom_point = 0;
            if ($symptom == "No angina (Asymptomatic)")
                $PTPsymptom_point = -1;
            if ($symptom == "Dyspnea")
                $PTPsymptom_point = -1;

            if ($Age >= 18 && $Age <= 39)
                $PTPAge_point = 3;

            if ($Age >= 40 && $Age <= 49)
                $PTPAge_point = 4;

            if ($Age >= 50 && $Age <= 59)
                $PTPAge_point = 5;

            if ($Age >= 60 && $Age <= 69)
                $PTPAge_point = 6;

            if ($Age >= 70)
                $PTPAge_point = 7;


            if ($TBP == 1)
                $PTPTHTN_point = 1;


            if ($TBP == 0)
                $PTPTHTN_point = 0;


            if ($Diabetes == 1)
                $PTPDM_point = 1;


            if ($Diabetes == 0)
                $PTPDM_point = 0;


            if ($FH == 1)
                $PTPFH_point = 1;


            if ($FH == 0)
                $PTPFH_point = 0;



            if ($THL == 1)
                $PTPHLP_point = 1;

            if ($THL == 0)
                $PTPHLP_point = 0;



            if ($Smoker == 1)
                $PTPSMOKER_point = 1;
            if ($Smoker == 0)
                $PTPSMOKER_point = 0;


            $Total_PTP_point = $PTPSMOKER_point + $PTPHLP_point + $PTPFH_point + $PTPDM_point + $PTPTHTN_point + $PTPAge_point + $PTPsymptom_point + $PTPsexx_point;
            $RSK_PTP = 1;
            if ((auth()->check() && auth()->user()->email == "bayatian@vcathlab.com")) {
                $RSK_PTP = 1;
            }
            if ($Total_PTP_point >= 1 && $Total_PTP_point <= 3)
                $RSK_PTP = 1.1;
            if ($Total_PTP_point >= 4)
                $RSK_PTP = -0.0706 * pow($Total_PTP_point, 3) + 2.3783 * pow($Total_PTP_point, 2) - 15.492 * pow($Total_PTP_point, 1) + 29.931;







            $Sens_ETT = 0.61;

            $Spec_ETT = 0.77;

            $PLR_ETT = $Sens_ETT / (1 - $Spec_ETT);

            $NLR_ETT = (1 - $Sens_ETT) / $Spec_ETT;

            $PTP_PLR_ETT = $RSK_PTP / 100;

            $PTP_NLR_ETT = $RSK_PTP / 100;

            $PTP_PLR_ODD_ETT = $PTP_PLR_ETT / (1 - $PTP_PLR_ETT);

            $PTP_NLR_ODD_ETT = $PTP_NLR_ETT / (1 - $PTP_NLR_ETT);

            $POST_PLR_ETT = ($PTP_PLR_ODD_ETT * $PLR_ETT) / (($PTP_PLR_ODD_ETT * $PLR_ETT) + 1) * 100;

            $POST_NLR_ETT = 100 - (($PTP_NLR_ODD_ETT * $NLR_ETT) / (($PTP_NLR_ODD_ETT * $NLR_ETT) + 1) * 100);


            if ($POST_PLR_ETT >= 85)

                $CondPOST_PLR_ETT = "Strongly Detectable";

            if ($POST_PLR_ETT >= 75 && $POST_PLR_ETT < 85)

                $CondPOST_PLR_ETT = "Modestly Detectable";

            if ($POST_PLR_ETT < 75)

                $CondPOST_PLR_ETT = "Weakly Detectable";



            if (($POST_NLR_ETT) >= 85)

                $CondPOST_NLR_ETT = "Strongly Reliable";

            if (($POST_NLR_ETT) >= 75 && $POST_NLR_ETT < 85)

                $CondPOST_NLR_ETT = "Modestly Reliable";

            if (($POST_NLR_ETT) < 75)

                $CondPOST_NLR_ETT = "Weakly Reliable";





            // SPECT


            $Sens_SPECT = 0.80;

            $Spec_SPECT = 0.72;

            $PLR_SPECT = $Sens_SPECT / (1 - $Spec_SPECT);

            $NLR_SPECT = (1 - $Sens_SPECT) / $Spec_SPECT;

            $PTP_PLR_SPECT = $RSK_PTP / 100;

            $PTP_NLR_SPECT = $RSK_PTP / 100;

            $PTP_PLR_ODD_SPECT = $PTP_PLR_SPECT / (1 - $PTP_PLR_SPECT);

            $PTP_NLR_ODD_SPECT = $PTP_NLR_SPECT / (1 - $PTP_NLR_SPECT);

            $POST_PLR_SPECT = ($PTP_PLR_ODD_SPECT * $PLR_SPECT) / (($PTP_PLR_ODD_SPECT * $PLR_SPECT) + 1) * 100;

            $POST_NLR_SPECT = 100 - (($PTP_NLR_ODD_SPECT * $NLR_SPECT) / (($PTP_NLR_ODD_SPECT * $NLR_SPECT) + 1) * 100);


            if ($POST_PLR_SPECT >= 85)

                $CondPOST_PLR_SPECT = "Strongly Detectable";

            if ($POST_PLR_SPECT >= 75 && $POST_PLR_SPECT < 85)

                $CondPOST_PLR_SPECT = "Modestly Detectable";

            if ($POST_PLR_SPECT < 75)

                $CondPOST_PLR_SPECT = "Weakly Detectable";



            if (($POST_NLR_SPECT) >= 85)

                $CondPOST_NLR_SPECT = "Strongly Reliable";

            if (($POST_NLR_SPECT) >= 75 && $POST_NLR_SPECT < 85)

                $CondPOST_NLR_SPECT = "Modestly Reliable";

            if (($POST_NLR_SPECT) < 75)

                $CondPOST_NLR_SPECT = "Weakly Reliable";




            // Stressecho


            $Sens_Stressecho = 0.76;

            $Spec_Stressecho = 0.88;

            $PLR_StressEcho = $Sens_Stressecho / (1 - $Spec_Stressecho);

            $NLR_StressEcho = (1 - $Sens_Stressecho) / $Spec_Stressecho;

            $PTP_PLR_Stressecho = $RSK_PTP / 100;

            $PTP_NLR_Stressecho = $RSK_PTP / 100;

            $PTP_PLR_ODD_Stressecho = $PTP_PLR_Stressecho / (1 - $PTP_PLR_Stressecho);

            $PTP_NLR_ODD_Stressecho = $PTP_NLR_Stressecho / (1 - $PTP_NLR_Stressecho);

            $POST_PLR_Stressecho = ($PTP_PLR_ODD_Stressecho * $PLR_StressEcho) / (($PTP_PLR_ODD_Stressecho * $PLR_StressEcho) + 1) * 100;

            $POST_NLR_Stressecho = 100 - (($PTP_NLR_ODD_Stressecho * $NLR_StressEcho) / (($PTP_NLR_ODD_Stressecho * $NLR_StressEcho) + 1) * 100);


            if (($POST_PLR_Stressecho) >= 85)

                $CondPOST_PLR_Stressecho = "Strongly Detectable";

            if (($POST_PLR_Stressecho) >= 75 && $POST_PLR_Stressecho < 85)

                $CondPOST_PLR_Stressecho = "Modestly Detectable";

            if (($POST_PLR_Stressecho) < 75)

                $CondPOST_PLR_Stressecho = "Weakly Detectable";



            if (($POST_NLR_Stressecho) >= 85)

                $CondPOST_NLR_Stressecho = "Strongly Reliable";

            if (($POST_NLR_Stressecho) >= 75 && $POST_NLR_Stressecho < 85)

                $CondPOST_NLR_Stressecho = "Modestly Reliable";

            if (($POST_NLR_Stressecho) < 75)

                $CondPOST_NLR_Stressecho = "Weakly Reliable";


            // CTANGIO


            $Sens_CTANGIO = 0.95;

            $Spec_CTANGIO = 0.72;

            $PLR_CTANGIO = $Sens_CTANGIO / (1 - $Spec_CTANGIO);

            $NLR_CTANGIO = (1 - $Sens_CTANGIO) / $Spec_CTANGIO;

            $PTP_PLR_CTANGIO = $RSK_PTP / 100;

            $PTP_NLR_CTANGIO = $RSK_PTP / 100;

            $PTP_PLR_ODD_CTANGIO = $PTP_PLR_CTANGIO / (1 - $PTP_PLR_CTANGIO);

            $PTP_NLR_ODD_CTANGIO = $PTP_NLR_CTANGIO / (1 - $PTP_NLR_CTANGIO);

            $POST_PLR_CTANGIO = ($PTP_PLR_ODD_CTANGIO * $PLR_CTANGIO) / (($PTP_PLR_ODD_CTANGIO * $PLR_CTANGIO) + 1) * 100;

            $POST_NLR_CTANGIO = 100 - (($PTP_NLR_ODD_CTANGIO * $NLR_CTANGIO) / (($PTP_NLR_ODD_CTANGIO * $NLR_CTANGIO) + 1) * 100);


            if ($POST_PLR_CTANGIO >= 85)

                $CondPOST_PLR_CTANGIO = "Strongly Detectable";

            if ($POST_PLR_CTANGIO >= 75 && $POST_PLR_CTANGIO < 85)

                $CondPOST_PLR_CTANGIO = "Modestly Detectable";

            if ($POST_PLR_CTANGIO < 75)

                $CondPOST_PLR_CTANGIO = "Weakly Detectable";



            if (($POST_NLR_CTANGIO) >= 85)

                $CondPOST_NLR_CTANGIO = "Strongly Reliable";

            if (($POST_NLR_CTANGIO) >= 75 && $POST_NLR_CTANGIO < 85)

                $CondPOST_NLR_CTANGIO = "Modestly Reliable";

            if (($POST_NLR_CTANGIO) < 75)

                $CondPOST_NLR_CTANGIO = "Weakly Reliable";






            // ETTP + SPECT

            $PTP_PLR_ETTPSPECT = $POST_PLR_ETT / 100;

            $PTP_NLR_ETTPSPECT = $POST_PLR_ETT / 100;

            $PTP_PLR_ODD_ETTPSPECT = $PTP_PLR_ETTPSPECT / (1 - $PTP_PLR_ETTPSPECT);

            $PTP_NLR_ODD_ETTPSPECT = $PTP_NLR_ETTPSPECT / (1 - $PTP_NLR_ETTPSPECT);

            $POST_PLR_ETTPSPECT = ($PTP_PLR_ODD_ETTPSPECT * $PLR_SPECT) / (($PTP_PLR_ODD_ETTPSPECT * $PLR_SPECT) + 1) * 100;

            $POST_NLR_ETTPSPECT = 100 - (($PTP_NLR_ODD_ETTPSPECT * $NLR_SPECT) / (($PTP_NLR_ODD_ETTPSPECT * $NLR_SPECT) + 1) * 100);



            if ($POST_PLR_ETTPSPECT >= 85)

                $CondPOST_PLR_ETTPSPECT = "Strongly Detectable";

            if ($POST_PLR_ETTPSPECT >= 75 && $POST_PLR_ETTPSPECT < 85)

                $CondPOST_PLR_ETTPSPECT = "Modestly Detectable";

            if ($POST_PLR_ETTPSPECT < 75)

                $CondPOST_PLR_ETTPSPECT = "Weakly Detectable";



            if (($POST_NLR_ETTPSPECT) >= 85)

                $CondPOST_NLR_ETTPSPECT = "Strongly Reliable";

            if (($POST_NLR_ETTPSPECT) >= 75 && $POST_NLR_ETTPSPECT < 85)

                $CondPOST_NLR_ETTPSPECT = "Modestly Reliable";

            if (($POST_NLR_ETTPSPECT) < 75)

                $CondPOST_NLR_ETTPSPECT = "Weakly Reliable";






            // ETTN + SPECT

            $PTP_PLR_ETTNSPECT = (100 - $POST_NLR_ETT) / 100;

            $PTP_NLR_ETTNSPECT = (100 - $POST_NLR_ETT) / 100;

            $PTP_PLR_ODD_ETTNSPECT = $PTP_PLR_ETTNSPECT / (1 - $PTP_PLR_ETTNSPECT);

            $PTP_NLR_ODD_ETTNSPECT = $PTP_NLR_ETTNSPECT / (1 - $PTP_NLR_ETTNSPECT);

            $POST_PLR_ETTNSPECT = ($PTP_PLR_ODD_ETTNSPECT * $PLR_SPECT) / (($PTP_PLR_ODD_ETTNSPECT * $PLR_SPECT) + 1) * 100;

            $POST_NLR_ETTNSPECT = 100 - (($PTP_NLR_ODD_ETTNSPECT * $NLR_SPECT) / (($PTP_NLR_ODD_ETTNSPECT * $NLR_SPECT) + 1) * 100);



            if ($POST_PLR_ETTNSPECT >= 85)

                $CondPOST_PLR_ETTNSPECT = "Strongly Detectable";

            if ($POST_PLR_ETTNSPECT >= 75 && $POST_PLR_ETTNSPECT < 85)

                $CondPOST_PLR_ETTNSPECT = "Modestly Detectable";

            if ($POST_PLR_ETTNSPECT < 75)

                $CondPOST_PLR_ETTNSPECT = "Weakly Detectable";



            if (($POST_NLR_ETTNSPECT) >= 85)

                $CondPOST_NLR_ETTNSPECT = "Strongly Reliable";

            if (($POST_NLR_ETTNSPECT) >= 75 && $POST_NLR_ETTNSPECT < 85)

                $CondPOST_NLR_ETTNSPECT = "Modestly Reliable";

            if (($POST_NLR_ETTNSPECT) < 75)

                $CondPOST_NLR_ETTNSPECT = "Weakly Reliable";





            // ETTP + StressEcho

            $PTP_PLR_ETTPStressEcho = $POST_PLR_ETT / 100;

            $PTP_NLR_ETTPStressEcho = $POST_PLR_ETT / 100;

            $PTP_PLR_ODD_ETTPStressEcho = $PTP_PLR_ETTPStressEcho / (1 - $PTP_PLR_ETTPStressEcho);

            $PTP_NLR_ODD_ETTPStressEcho = $PTP_NLR_ETTPStressEcho / (1 - $PTP_NLR_ETTPStressEcho);

            $POST_PLR_ETTPStressEcho = ($PTP_PLR_ODD_ETTPStressEcho * $PLR_StressEcho) / (($PTP_PLR_ODD_ETTPStressEcho * $PLR_StressEcho) + 1) * 100;

            $POST_NLR_ETTPStressEcho = 100 - (($PTP_NLR_ODD_ETTPStressEcho * $NLR_StressEcho) / (($PTP_NLR_ODD_ETTPStressEcho * $NLR_StressEcho) + 1) * 100);




            if (($POST_PLR_ETTPStressEcho) >= 85)

                $CondPOST_PLR_ETTPStressEcho = "Strongly Detectable";

            if (($POST_PLR_ETTPStressEcho) >= 75 && $POST_PLR_ETTPStressEcho < 85)

                $CondPOST_PLR_ETTPStressEcho = "Modestly Detectable";

            if (($POST_PLR_ETTPStressEcho) < 75)

                $CondPOST_PLR_ETTPStressEcho = "Weakly Detectable";



            if (($POST_NLR_ETTPStressEcho) >= 85)

                $CondPOST_NLR_ETTPStressEcho = "Strongly Reliable";

            if (($POST_NLR_ETTPStressEcho) >= 75 && $POST_NLR_ETTPStressEcho < 85)

                $CondPOST_NLR_ETTPStressEcho = "Modestly Reliable";

            if (($POST_NLR_ETTPStressEcho) < 75)

                $CondPOST_NLR_ETTPStressEcho = "Weakly Reliable";






            // ETTN + StressEcho

            $PTP_PLR_ETTNStressEcho = (100 - $POST_NLR_ETT) / 100;

            $PTP_NLR_ETTNStressEcho = (100 - $POST_NLR_ETT) / 100;

            $PTP_PLR_ODD_ETTNStressEcho = $PTP_PLR_ETTNStressEcho / (1 - $PTP_PLR_ETTNStressEcho);

            $PTP_NLR_ODD_ETTNStressEcho = $PTP_NLR_ETTNStressEcho / (1 - $PTP_NLR_ETTNStressEcho);

            $POST_PLR_ETTNStressEcho = ($PTP_PLR_ODD_ETTNStressEcho * $PLR_StressEcho) / (($PTP_PLR_ODD_ETTNStressEcho * $PLR_StressEcho) + 1) * 100;

            $POST_NLR_ETTNStressEcho = 100 - (($PTP_NLR_ODD_ETTNStressEcho * $NLR_StressEcho) / (($PTP_NLR_ODD_ETTNStressEcho * $NLR_StressEcho) + 1) * 100);





            if ($POST_PLR_ETTNStressEcho >= 85)

                $CondPOST_PLR_ETTNStressEcho = "Strongly Detectable";

            if ($POST_PLR_ETTNStressEcho >= 75 && $POST_PLR_ETTNStressEcho < 85)

                $CondPOST_PLR_ETTNStressEcho = "Modestly Detectable";

            if ($POST_PLR_ETTNStressEcho < 75)

                $CondPOST_PLR_ETTNStressEcho = "Weakly Detectable";



            if (($POST_NLR_ETTNStressEcho) >= 85)

                $CondPOST_NLR_ETTNStressEcho = "Strongly Reliable";

            if (($POST_NLR_ETTNStressEcho) >= 75 && $POST_NLR_ETTNStressEcho < 85)

                $CondPOST_NLR_ETTNStressEcho = "Modestly Reliable";

            if (($POST_NLR_ETTNStressEcho) < 75)

                $CondPOST_NLR_ETTNStressEcho = "Weakly Reliable";
        }
        if ((auth()->check() && auth()->user()->email == "bayatian@vcathlab.com")) {
            $RSK_PTP = 1;
        }
        if ($RSK_PTP <= 5) {
            $CondRSK_PTP = "Low risk (can be managed without further testing).";
            $CondRSK_PTPI = "";

            $CondRSK_PTPI1 = "";

            $CondRSK_PTPI2 = "";
            $CondRule = "Rule out CAD";
        }


        if ($RSK_PTP > 5 && $RSK_PTP <= 15) {
            $CondRSK_PTP = "Borderline risk (can be managed with exercise ECG if feasible as the initial test).";

            $CondRule = "Rule out and Rule in CAD";

            $CondRSK_PTPI = "Exercise ECG (ETT) as initial test.";

            $CondRSK_PTPI1 = "If ETT became positive, CT angiography recommended (" . number_format($POST_PLR_ETT, 2) . "% rule in CAD).";

            $CondRSK_PTPI2 = "If ETT became negative, medical treatment recommended (" . number_format($POST_NLR_ETT, 2) . "% rule out CAD).";
        }


        if ($RSK_PTP > 15 && $RSK_PTP <= 30) {
            $CondRSK_PTP = "Moderate risk (can be managed with non-invasive imaging functional test).";

            $CondRule = "Rule in and Rule out CAD";

            $CondRSK_PTPI = "Stress SPECT or SPECT with exercise ECG if feasible as initial test.";

            $CondRSK_PTPI1 = "If SPECT became positive, CT angiography recommended (" . number_format($POST_PLR_SPECT, 2) . "% rule in CAD).";

            $CondRSK_PTPI2 = "If SPECT became negative, medical treatment recommended (" . number_format($POST_NLR_SPECT, 2) . "% rule out CAD).";
        }


        if ($RSK_PTP > 30 && $RSK_PTP <= 60) {
            $CondRSK_PTP = "Moderate risk (can be managed with non-invasive imaging functional test).";

            $CondRule = "Rule in and Rule out CAD";

            $CondRSK_PTPI = "Stress SPECT or SPECT with exercise ECG if feasible as initial test.";

            $CondRSK_PTPI1 = "If SPECT became positive, Invasive Coronary Angiography recommended (" . number_format($POST_PLR_SPECT, 2) . "% rule in CAD).";

            $CondRSK_PTPI2 = "If SPECT became negative, CT angiography recommended (" . number_format($POST_NLR_SPECT, 2) . "% rule out CAD).";
        }


        if ($RSK_PTP > 60) {
            $CondRSK_PTP = "High risk (can be assume that CAD is present).";
            $CondRSK_PTPI = "";

            $CondRSK_PTPI1 = "";

            $CondRSK_PTPI2 = "";
            $CondRule = "Rule in CAD";
        }

        if ((auth()->check() && auth()->user()->panel_type == 3) || (auth()->check() && auth()->user()->panel_type == 4) || (auth()->check() && auth()->user()->panel_type == 5) || (auth()->check() && auth()->user()->panel_type == 6) ||  $request->has("get_new_words")) {

            // if(auth()->user()->panel_type == 6){
            //     $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace_najafi.docx"));

            //     $Ideal_weight = 50 + (0.91*($Heigth - 152.4));

            //     $Height = $Heigth / 100;

            //     $BMI = $Weigth / (pow($Heigth,2));
            //     if ($BMI < 18.5)
            //         $Condition = "Underweight";

            //     if ($BMI >= 18.5 & $BMI < 24.9)
            //         $Condition = "Normal weight";

            //     if ($BMI >= 24.9 & $BMI < 29.9)
            //         $Condition = "Overweight";

            //     if ($BMI >= 29.9)
            //         $Condition = "Severe obesity";


            //     $Body_fat = (1.20*$BMI) + (0.23*$Age) - 16.2;


            //     if ($Body_fat < 15)
            //         $ConditionBF = "Essential fat";

            //     if ($Body_fat >= 15 & $Body_fat < 20)
            //         $ConditionBF = "Athletes";

            //     if ($Body_fat >= 20 & $Body_fat < 30)
            //         $ConditionBF = "Fitness";

            //     if ($Body_fat >= 30)
            //         $ConditionBF = "Obese";


            //     $msg3="Body Mass Index (BMI) = $BMI, $Condition, (ideal weight = $Ideal_weight (kg))";
            //     $msg4="Body Fat Percentage (BFP)  = $Body_fat, $ConditionBF, (Ideal Fat = 19 - 29%)";
            //     $msg5="Physical Activity during a week was ".$data['physical_activity'].".";
            //     $template->setValue("msg3",$msg3);
            //     $template->setValue("msg4",$msg4);
            //     $template->setValue("msg5",$msg5);

            //     $template->setValue("RISK_FACTORS",implode(",",$data['risk_factors']));
            //     $template->setValue("HISTORY",implode(",",$data['history']));
            //     $template->setValue("CHIEF_COMPLAINT",implode(",",$data['chief_complaint']));
            // }else
            if ((auth()->check() && auth()->user()->panel_type == 5) || (auth()->check() && auth()->user()->panel_type == 6) || $request->has("get_new_words")) {
                $RSK = $Risk1;
                if ($RSK <= 5)
                    $ConditionRSK = "Low risk (SCORE smaller than 5.0)";

                if ($RSK > 5 && $RSK <= 7.5)
                    $ConditionRSK = "Borderline risk (SCORE smaller than 7.5)";

                if ($RSK > 7.5 && $RSK < 20)
                    $ConditionRSK = "Intermediate risk (SCORE greater than 7.5)";

                if ($RSK >= 20)
                    $ConditionRSK = "High risk (SCORE greater than 20)";



                if ($Sex == 0) {
                    if ($RSK <= 1.61)
                        $Vascular_age = 21.927 * log($RSK) + 49.429;
                    if ($RSK > 1.61 && $RSK <= 28)
                        $Vascular_age = 57.183 * pow($RSK, 0.1472);
                    if ($RSK > 28)
                        $Vascular_age = 94;
                }


                if ($Sex == 1) {
                    if ($RSK <= 3.25)
                        $Vascular_age = 22.171 * log($RSK) + 30.656;
                    if ($RSK > 2.61 && $RSK <= 32)
                        $Vascular_age = 46.815 * pow($RSK, 0.2025);
                    if ($RSK > 32)
                        $Vascular_age = 94;
                }






                $PWV = 1.0796 - 0.0317 * $Vascular_age + 0.0015 * pow($Vascular_age, 2) + 0.0325 * $SBP;



                $DeltaP = ($SBP - $DBP) * 133.3;

                $Beta_stiffness = (2120 / $DeltaP) * pow($PWV, 2) * log($SBP / $DBP);

                $CAVI = 0.063 * $Beta_stiffness + 7.758;


                if ($CAVI < 9)
                    $ConCAVI = "Normal (CAVI smaller than 9)";
                if ($CAVI >= 9)
                    $ConCAVI = "Abnormal (CAVI greater than or equal to 9)";

                $Heigth = $Heigth / 100;


                $BMI = $Weigth / (pow($Heigth, 2));

                if ($BMI < 18.5)
                    $ConBMI = "Underweight";

                if ($BMI >= 18.5 && $BMI < 25)
                    $ConBMI = "Normal weight";

                if ($BMI >= 25 && $BMI <= 29.9)
                    $ConBMI = "Overweight";

                if ($BMI > 29.9 && $BMI <= 34.9)
                    $ConBMI = "Obese Class I";
                if ($BMI > 34.9 && $BMI <= 39.9)
                    $ConBMI = "Obese Class II";
                if ($BMI > 39.9)
                    $ConBMI = "Obese Class III";

                $Ideal_weight = 50 + (0.91 * (($Heigth * 100) - 152.4));

                if ($Sex == 1) {
                    $Body_fat = -44.988 + (0.503 * $Age) + (3.172 * $BMI) - (0.026 * pow($BMI, 2)) - (0.02 * $BMI * $Age) + (0.00021 * pow($BMI, 2) * $Age);


                    if ($Body_fat <= 5)
                        $ConditionBF = "Essential fat";

                    if ($Body_fat > 5 && $Body_fat <= 13)
                        $ConditionBF = "Athletes";

                    if ($Body_fat > 13 && $Body_fat <= 17)
                        $ConditionBF = "Fitness";

                    if ($Body_fat > 17 && $Body_fat <= 26)

                        $ConditionBF = "Average";

                    if ($Body_fat > 26)
                        $ConditionBF = "Obese";
                }



                if ($Sex == 0) {
                    $Body_fat = -44.988 + (0.503 * $Age) + (10.689)

                        + (3.172 * $BMI) - (0.026 * pow($BMI, 2)) + (0.181 * $BMI)

                        - (0.02 * $BMI * $Age) - (0.005 * pow($BMI, 2)) + (0.00021 * pow($BMI, 2) * $Age);


                    if ($Body_fat <= 13)

                        $ConditionBF = "Essential fat";

                    if ($Body_fat > 13 && $Body_fat <= 20)

                        $ConditionBF = "Athletes";

                    if ($Body_fat > 20 && $Body_fat <= 24)

                        $ConditionBF = "Fitness";

                    if ($Body_fat > 24 && $Body_fat <= 38)

                        $ConditionBF = "Average";

                    if ($Body_fat > 38)
                        $ConditionBF = "Obese";
                }


                //___________________________________________________________________________


                if ($Sex == 1) {
                    $TBW = 2.447 - 0.09156 * $Age + 0.1074 * ($Heigth * 100) + 0.3362 * $Weigth;

                    $TBWP = $TBW / $Weigth;
                    $TBWP = $TBWP * 100;
                    if ($TBWP < 50)
                        $CondTBWP = "Low";

                    if ($TBWP > 50)
                        $CondTBWP = "Normal";
                }




                if ($Sex == 0) {
                    $TBW = -2.097 + 0.1069 * ($Heigth * 100) + 0.2466 * $Weigth;

                    $TBWP = $TBW / $Weigth;
                    $TBWP = $TBWP * 100;
                    if ($TBWP < 45)
                        $CondTBWP = "Low";
                    if ($TBWP > 45)
                        $CondTBWP = "Normal";
                }




                //_________________________________________________________________________



                if ($Sex == 1) {
                    $LBM = -29.5336 + 0.33929 * ($Heigth * 100) + 0.32810 * $Weigth;

                    $LBMP = $LBM / $Weigth;
                    $LBMP = $LBMP * 100;

                    if ($LBMP < 65)
                        $CondLBMP = "Low";
                    if ($LBMP >= 65)
                        $CondLBMP = "Normal";
                }



                if ($Sex == 0) {
                    $LBM = -43.2933 + 0.41813 * ($Heigth * 100) + 0.29569 * $Weigth;

                    $LBMP = $LBM / $Weigth;
                    $LBMP = $LBMP * 100;

                    if ($LBMP < 65)
                        $CondLBMP = "Low";
                    if ($LBMP >= 65)
                        $CondLBMP = "Normal";
                }

                if ($SBP <= 105)
                    $SBP_point = 0;

                if ($SBP > 105 && $SBP <= 109)
                    $SBP_point = 5;

                if ($SBP >= 110 && $SBP <= 114)
                    $SBP_point = 6;

                if ($SBP >= 115 && $SBP <= 119)
                    $SBP_point = 7;

                if ($SBP >= 120 && $SBP <= 124)
                    $SBP_point = 8;

                if ($SBP >= 125 && $SBP <= 129)
                    $SBP_point = 9;

                if ($SBP >= 130 && $SBP <= 134)
                    $SBP_point = 10;
                if ($SBP >= 135 && $SBP <= 139)
                    $SBP_point = 11;
                if ($SBP >= 140)
                    $SBP_point = 11;

                if ($DBP <= 65)
                    $DBP_point = 0;

                if ($DBP > 65 && $DBP <= 69)
                    $DBP_point = 2;

                if ($DBP >= 70 && $DBP <= 74)
                    $DBP_point = 3;

                if ($DBP >= 75 && $DBP <= 79)
                    $DBP_point = 4;

                if ($DBP >= 80 && $DBP <= 84)
                    $DBP_point = 5;

                if ($DBP >= 85 && $DBP <= 89)
                    $DBP_point = 6;
                if ($DBP >= 90)
                    $DBP_point = 6;

                if ($BMI <= 18.5) {
                    if ($Age >= 18 && $Age <= 30)
                        $BMI_point = -2;
                    if ($Age >= 31 && $Age <= 40)
                        $BMI_point = 1;

                    if ($Age >= 41 && $Age <= 50)
                        $BMI_point = 3;

                    if ($Age >= 51 && $Age <= 60)
                        $BMI_point = 6;

                    if ($Age >= 61 && $Age < 70)
                        $BMI_point = 8;
                    if ($Age >= 70)
                        $BMI_point = 8;
                }




                if ($BMI > 18.5 && $BMI <= 24) {
                    if ($Age >= 18 && $Age <= 30)
                        $BMI_point = 0;
                    if ($Age >= 31 && $Age <= 40)
                        $BMI_point = 2;
                    if ($Age >= 41 && $Age <= 50)
                        $BMI_point = 4;

                    if ($Age >= 51 && $Age <= 60)
                        $BMI_point = 6;
                    if ($Age >= 61 && $Age < 70)
                        $BMI_point = 8;
                    if ($Age >= 70)
                        $BMI_point = 8;
                }




                if ($BMI > 24 && $BMI < 28) {
                    if ($Age >= 18 && $Age <= 30)
                        $BMI_point = 3;
                    if ($Age >= 31 && $Age <= 40)
                        $BMI_point = 4;
                    if ($Age >= 41 && $Age <= 50)
                        $BMI_point = 6;
                    if ($Age >= 51 && $Age <= 60)
                        $BMI_point = 7;
                    if ($Age >= 61 && $Age < 70)
                        $BMI_point = 8;
                    if ($Age >= 70)
                        $BMI_point = 8;
                }




                if ($BMI >= 28) {
                    if ($Age >= 18 && $Age <= 30)
                        $BMI_point = 7;
                    if ($Age >= 31 && $Age <= 40)
                        $BMI_point = 7;
                    if ($Age >= 41 && $Age <= 50)
                        $BMI_point = 7;
                    if ($Age >= 51 && $Age <= 60)
                        $BMI_point = 8;
                    if ($Age >= 61 && $Age < 70)
                        $BMI_point = 8;
                    if ($Age >= 70)
                        $BMI_point = 8;
                }

                if ($Parental_hypertension == "1")
                    $HTN_point = 1;
                if ($Parental_hypertension == "0")
                    $HTN_point = 0;
                if ($TBP == "1")
                    $HTN_point = 1;
                $Total_point = $HTN_point + $BMI_point + $DBP_point + $SBP_point;

                if ($Total_point >= -2 && $Total_point <= 0)
                    $RISK_HTN = ((0.0005 * $Total_point) + 0.0023) * 100;
                if ($Total_point >= 1 && $Total_point <= 18)
                    $RISK_HTN = (0.0025 * exp(0.2653 * $Total_point)) * 100;


                if ($Total_point >= 19 && $Total_point <= 26)
                    $RISK_HTN = (0.0654 * ($Total_point) - 0.9182) * 100;

                if ($RISK_HTN <= 20)
                    $CondRISK_HTN = "normal value";
                if ($RISK_HTN > 20 && $RISK_HTN < 60)
                    $CondRISK_HTN = "Intermediate value";
                if ($RISK_HTN >= 60)
                    $CondRISK_HTN = "high value";
                if ($SBP <= 120)
                    $CondSBP = "optimal";
                if ($SBP > 120 && $SBP <= 130)
                    $CondSBP = "Normal";
                if ($SBP >= 130 && $SBP < 140)
                    $CondSBP = "High normal";
                if ($SBP >= 140)
                    $CondSBP = "Hypertension";
                $MMAP = 0.3333 * ((2 * $DBP) + $SBP);
                if ($MMAP > 102)
                    $CondLMAP = "Critical";
                else if ($MMAP <= 102)
                    $CondLMAP = "Normal";

                $PP = $SBP - $DBP;


                if ($PP < 35)
                    $CondPP = "Critical";
                else if ($PP >= 35)
                    $CondPP = "Normal";


                $PPWV = 1.0796 - 0.0317 * $Age + 0.0015 * pow($Age, 2) + 0.0325 * $SBP;

                if ($PPWV > 10)
                    $CondPPWV = "Critical";
                else if ($PPWV <= 10)
                    $CondPPWV = "Normal";

                $Difweight = $Weigth - $Ideal_weight;
                $DifRSK = $Risk1 - $OMen;
                $Dif_age = $Vascular_age - $Age;
                if ($Vascular_age > $Age) {

                    $CondVasular = "If there is no commitment to medical therapy, lifestyle modification and control of risk factors.";
                    $Cond_age = "Older than";
                } else if ($Vascular_age < $Age) {

                    $CondVasular = "Younger than calendar age";
                    $Cond_age = "Younger than";
                }
                $RISK_FACTORS = implode(" , ", $data['risk_factors']);
                $Height = $Heigth * 100;
                $DBP = round(floatval(number_format($DBP, 2)) + 0);
                $SBP = round(floatval(number_format($SBP, 2)) + 0);
                $Vascular_age = round(floatval(number_format($Vascular_age, 2)) + 0);
                $Ideal_weight = round(floatval(number_format($Ideal_weight, 2)) + 0);

                if ((auth()->check() && auth()->user()->panel_type == 6)  || $request->has("get_new_words")) {
                    // if(auth()->user()->email == "nkojuri@vcathlab.com"){
                    //     $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/ArterialStiffnessIndex.docx"));
                    //     $template2=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/KojuriTriageTest.docx"));
                    //     $template3=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/ClinicallikelihoodofCAD.docx"));
                    //     foreach($template2->getVariables() as $item){
                    //         if(isset($$item)){
                    //             $template2->setValue($item,(is_numeric($$item) && (!in_array($item,["Age","DBP","SBP","Vascular_age","Ideal_weight","Height","Weigth"])) ? number_format($$item,2):$$item));
                    //         }
                    //     }
                    //     $template2->setValue("sex",($Sex == 1 ? "Male":"Female"));
                    //     $template2->setValue("name",$mace->patient ? $mace->patient->name:"");
                    //     $template2->setValue("age",$Age);
                    //     foreach($template3->getVariables() as $item){
                    //         if(isset($$item)){
                    //             $template3->setValue($item,(is_numeric($$item) && (!in_array($item,["Age","DBP","SBP","Vascular_age","Ideal_weight","Height","Weigth"])) ? number_format($$item,2):$$item));
                    //         }
                    //     }
                    //     $template3->setValue("sex",($Sex == 1 ? "Male":"Female"));
                    //     $template3->setValue("name",$mace->patient ? $mace->patient->name:"");
                    //     $template3->setValue("age",$Age);
                    // }
                    if ((auth()->check() && auth()->user()->email == "najafi@vcathlab.com") || (auth()->check() && auth()->user()->email == "mghasemi@vcathlab.com")) {
                        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace_najafi.docx"));
                        $template2 = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/BodyandBPTriageTest.docx"));
                        $template3 = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/najafi-cad-template.docx"));
                        foreach ($template2->getVariables() as $item) {
                            if (isset($$item)) {
                                $template2->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                            }
                        }
                        $template2->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
                        $template2->setValue("name", $mace->patient ? $mace->patient->name : "");
                        $template2->setValue("age", $Age);
                        foreach ($template3->getVariables() as $item) {
                            if (isset($$item)) {
                                $template3->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                            }
                        }
                        $template3->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
                        $template3->setValue("name", $mace->patient ? $mace->patient->name : "");
                        $template3->setValue("age", $Age);
                    } else {
                        if ((auth()->check() && auth()->user()->email == "inajafi@vcathlab.com")) {
                            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace-inajafi.docx"));
                        } else {
                            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/TotalResult.docx"));
                        }
                        $template2 = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/AnkleBrachialIndex.docx"));
                        $template3 = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/CardiovascularScreeningTest.docx"));
                        $template4 = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/ClinicallikelihoodofCAD.docx"));
                        foreach ($template2->getVariables() as $item) {
                            if (isset($$item)) {
                                $template2->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                            }
                        }
                        $template2->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
                        $template2->setValue("name", $mace->patient ? $mace->patient->name : "");
                        $template2->setValue("age", $Age);
                        foreach ($template3->getVariables() as $item) {
                            if (isset($$item)) {
                                $template3->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                            }
                        }
                        foreach ($template4->getVariables() as $item) {
                            if (isset($$item)) {
                                $template4->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                            }
                        }
                        $template3->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
                        $template3->setValue("name", $mace->patient ? $mace->patient->name : "");
                        $template3->setValue("age", $Age);
                        $template4->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
                        $template4->setValue("name", $mace->patient ? $mace->patient->name : "");
                        $template4->setValue("age", $Age);
                    }
                } else {
                    $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace-template4.docx"));
                }
                foreach ($template->getVariables() as $item) {
                    if (isset($$item)) {
                        $template->setValue($item, (is_numeric($$item) && (!in_array($item, ["Age", "DBP", "SBP", "Vascular_age", "Ideal_weight", "Height", "Weigth"])) ? number_format($$item, 2) : $$item));
                    }
                }
            } else if (auth()->user()->email == "nkojuri@vcathlab.com") {
                $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace-template4.docx"));
            } else {
                $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace_ghasemi.docx"));
            }
            $template->setValue("msg", $msg);
            $template->setValue("msg2", $msg2);
            $template->setValue("Risk1", (floatval(number_format($Risk1, 2)) + 0));
            $template->setValue("OMen", (floatval(number_format($OMen, 2)) + 0));
            $template->setValue("Risk2", (floatval(number_format($Risk2, 2)) + 0));
            $template->setValue("RSK1", (floatval(number_format($RSK1, 2)) + 0));
            $template->setValue("DBP", (floatval(number_format($DBP, 2)) + 0));
            $template->setValue("SBP", (floatval(number_format($SBP, 2)) + 0));
            $template->setValue("ABI", (floatval(number_format($ABI, 2)) + 0));
            $template->setValue("ASI", round(floatval(number_format($ASI, 2)) + 0));
            $template->setValue("name", $mace->patient ? $mace->patient->name : "");
            $template->setValue("age", $Age);
            $template->setValue("PWV", $PWV);

            $template->setValue("sex", ($Sex == 1 ? "Male" : "Female"));
            $template->setValue("date", $mace->created_at->format("Y-m-d"));
            $filename = "MACE_" . $mace->id . "_" . time() . ".docx";
            if (!file_exists(storage_path("app/public/mace_assesments"))) {
                mkdir(storage_path("app/public/mace_assesments"));
            }
            $template->saveAs(storage_path("app/public/mace_assesments/" . $filename));
        } else {
            // if(auth()->user()->email == "nkojuri@vcathlab.com"){
            //     $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace-template4.docx"));
            // }else{
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace.docx"));
            // }
            $template->setValue("msg", $msg);
            $template->setValue("msg2", $msg2);
            $template->setValue("Risk1", number_format($Risk1, 2));
            $template->setValue("OMen", number_format($OMen, 2));
            $template->setValue("Risk2", number_format($Risk2, 2));
            $template->setValue("RSK1", number_format($RSK1, 2));
            $filename = "MACE_" . $mace->id . "_" . time() . ".docx";
            if (!file_exists(storage_path("app/public/mace_assesments"))) {
                mkdir(storage_path("app/public/mace_assesments"));
            }
            $template->saveAs(storage_path("app/public/mace_assesments/" . $filename));
        }
        $links = [];
        if (isset($template2)) {
            $filename2 = "MACE_BP_TRIAGE_" . $mace->id . "_" . time() . ".docx";
            $template2->saveAs(storage_path("app/public/mace_assesments/" . $filename2));
            $links['bp_triage'] = [
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/mace_assesments/' . $filename2),
                'word_link' => url('/storage/mace_assesments/' . $filename2)
            ];
        }
        if (isset($template3)) {
            $filename3 = "MACE_PTP_CAD_" . $mace->id . "_" . time() . ".docx";
            $template3->saveAs(storage_path("app/public/mace_assesments/" . $filename3));
            $links['ptp_cad'] = [
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/mace_assesments/' . $filename3),
                'word_link' => url('/storage/mace_assesments/' . $filename3)
            ];
        }
        if (isset($template4)) {
            $filename4 = "ClinicallikelihoodofCAD_" . $mace->id . "_" . time() . ".docx";
            $template4->saveAs(storage_path("app/public/mace_assesments/" . $filename4));
            $links['ClinicallikelihoodofCAD'] = [
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/mace_assesments/' . $filename4),
                'word_link' => url('/storage/mace_assesments/' . $filename4)
            ];
        }

        return [
            'ok' => true,
            'data' => [
                'mace' => $mace,
                'result' => [
                    'msg' => $msg,
                    'msg2' => $msg2,
                    'Risk1' => $Risk1,
                    'OMen' => $OMen,
                    'Risk2' => $Risk2,
                    'RSK1' => $RSK1,
                    'ASI' => $ASI,
                    'PWV' => $PWV
                ],
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/mace_assesments/' . $filename),
                'word_link' => url('/storage/mace_assesments/' . $filename),
                'links' => $links
            ]
        ];

        //Risk of plaque progress with current risk factors  =  $Risk1  ($msg)

        //Risk of plaque progress with optimal risk factors  = $Omen  (optimal risk)


        //Risk of MI and stroke with current risk factors  =  $Risk2  ($msg2)

        //Risk of MI and stroke with optimal risk factors  = $RSK1  (optimal risk)


        //The patient is $msg for atherosclerosis plaque progress.

        //The patient is $msg2 for MI and stroke event.

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
