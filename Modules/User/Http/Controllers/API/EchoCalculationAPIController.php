<?php

namespace Modules\User\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\API\CreateEchoCalculationAPIRequest;
use Modules\User\Http\Requests\API\UpdateEchoCalculationAPIRequest;
use Modules\User\Models\EchoCalculation;
use Modules\User\Models\Patient;
use Modules\User\Repositories\EchoCalculationRepository;
use Response;

/**
 * Class EchoCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class EchoCalculationAPIController extends AppBaseController
{
    /** @var  EchoCalculationRepository */
    private $echoCalculationRepository;

    public function __construct(EchoCalculationRepository $echoCalculationRepo)
    {
        $this->echoCalculationRepository = $echoCalculationRepo;
        $this->middleware('auth:sanctum')->except("store");

    }

    /**
     * Display a listing of the EchoCalculation.
     * GET|HEAD /echoCalculations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $echoCalculations = $this->echoCalculationRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        if (!auth()->user()->master) {
            $echoCalculations = $echoCalculations->where("user_id", auth()->user()->id);
            $echoCalculationsCount = EchoCalculation::where("user_id", auth()->user()->id)->count();
        } else {
            $echoCalculationsCount = EchoCalculation::count();
        }
        $limit = $request->get('limit', 10);
        $echoCalculations = $echoCalculations->get();
        return $this->sendResponse(['pagination_data' => ['count' => $echoCalculationsCount, 'total_pages' => ceil($echoCalculationsCount / $limit)], 'items' => $echoCalculations->toArray()], 'Echo Calculations retrieved successfully');
    }

    /**
     * Store a newly created EchoCalculation in storage.
     * POST /echoCalculations
     *
     * @param CreateEchoCalculationAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'LVEDD' => 'required',
            'LVESD' => 'required',
            'IVSD' => 'required',
            'DBP' => 'required',
            'patient_id' => 'nullable',
            'PWTD' => 'required',
            'TAPSE' => 'required',
            'PAP' => 'required',
            'SBP' => 'required',
            'LVEF' => 'required',
            'Weight' => 'required',
            'Height' => 'required',
            'HR' => 'required',
            'conditions' => 'required',
            'MR' => "sometimes",
            'MVP' => "sometimes",
            'PI' => "sometimes",
            'TS' => "sometimes",
            'TR' => "sometimes",
            'PS' => "sometimes",
            'AI' => "sometimes",
            'AS' => "sometimes",
            'MS' => "sometimes",
            'LVH' => "sometimes",
            'RWMA' => "sometimes",
            'RA' => "sometimes",
            'LA' => "sometimes",
            'RV' => "sometimes",
            'LV' => "sometimes",
            'LCIMT' => "sometimes",
            'RCIMT' => "sometimes",
        ]);
        if ((auth()->check() && auth()->user()->panel_type == 4) || (auth()->check() && auth()->user()->panel_type == 5) || (auth()->check() && auth()->user()->panel_type == 6)) {
            ['PG' => $PG, 'MG' => $MG, 'TRG' => $TRG, 'PASP' => $PASP, 'MR' => $MR, 'MVP' => $MVP, 'PI' => $PI, 'TS' => $TS, 'TR' => $TR, 'PS' => $PS, 'AI' => $AI, 'AS' => $AS, 'MS' => $MS, 'LVH' => $LVH, 'RWMA' => $RWMA, 'RA' => $RA, 'LA' => $LA, 'RV' => $RV, 'LV' => $LV, 'LVEDD' => $LVEDD, 'LVESD' => $LVESD, 'IVSD' => $IVSD, 'DBP' => $DBP, 'PWTD' => $PWTD, 'TAPSE' => $TAPSE, 'PAP' => $PAP, 'SBP' => $SBP, 'LVEF' => $LVEF, 'Weight' => $Weight, 'Height' => $Height, 'HR' => $HR] = $request->all();
        } else {
            ['LVEDD' => $LVEDD, 'LVESD' => $LVESD, 'IVSD' => $IVSD, 'DBP' => $DBP, 'PWTD' => $PWTD, 'TAPSE' => $TAPSE, 'PAP' => $PAP, 'SBP' => $SBP, 'LVEF' => $LVEF, 'Weight' => $Weight, 'Height' => $Height, 'HR' => $HR] = $data;
        }

        try{
          if ((auth()->check() && (auth()->user()->email != 'abayatian@vcathlab.com' || auth()->user()->email != 'nkojuri@vcathlab.com' || auth()->user()->email != 'kojuri@vcathlab.com' || auth()->user()->email != 'bayatian@vcathlab.com'))) {
              ['LCIMT' => $LCIMT, 'RCIMT' => $RCIMT] = $data;
          }
        }catch(\Exception $e){
        }
        $Age = 0;
        $Sex = 1;
        if (isset($data['patient_id']) && $data['patient_id']) {
            $patient = Patient::find($data['patient_id']);
            $Age = $patient->age;
            $Sex = $patient->sex;
        }
        $ASCA = $request->get("ASCA");
        ['A1' => $A1, 'A2' => $A2, 'A3' => $A3, 'A4' => $A4, 'A5' => $A5, 'A6' => $A6, 'A7' => $A7, 'A8' => $A8, 'A9' => $A9, 'A10' => $A10, 'A11' => $A11, 'A12' => $A12, 'A13' => $A13, 'A14' => $A14] = $data['conditions'];
        if (auth()->check()) {
            $data['user_id'] = auth()->user()->id;
            if (auth()->user()->email == "kojuri@vcathlab.com") {
                $LVEDD = $LVEDD / 10;
                $LVESD = $LVESD / 10;
                $IVSD = $IVSD / 10;
                $PWTD = $PWTD / 10;
                $TAPSE = $TAPSE / 10;
            }
        } else {
            $data['user_id'] = 28;

            $LVEDD = $LVEDD / 10;
            $LVESD = $LVESD / 10;
            $IVSD = $IVSD / 10;
            $PWTD = $PWTD / 10;
            $TAPSE = $TAPSE / 10;
        }

        $SUM =
            $A1 + $A2 + $A3 + $A4 + $A5 + $A6 + $A7 + $A8 + $A9 + $A10 + $A11 + $A12 + $A13 + $A14;

        $WMS = $SUM / 14;

        $Ejection_fraction = (0.93 - 0.26 * $WMS) * 100;

        $MAP = $DBP + (0.3333 + $HR * 0.0012) * ($SBP - $DBP);

        $EDV = (7 / (2.4 + $LVEDD)) * (pow($LVEDD, 3));

        $ESV = (7 / (2.4 + $LVESD)) * (pow($LVESD, 3));
        // $ESV = $EDV*(1-$LVEF);
        $ESV = $EDV * (1 - ($LVEF / 100));
        $SV = $EDV - $ESV;

        $SVI = $SV / sqrt(($Weight * $Height) / 3600);

        $CO = ($SV * $HR) / 1000;

        $CI = $CO / sqrt(($Weight * $Height) / 3600);

        $CBF = 0.05 * $CO;

        $SVR = (($MAP - 12) / $CO) * 0.8;

        $PVR = (($PAP - 7) / $CO) * 0.8;

        $CRI = $MAP / ($CBF * 16.67);

        $LVMI = (0.8 * ((1.04 * pow(($IVSD + $LVEDD + $PWTD), 3) - pow($LVEDD, 3)) / sqrt(($Weight * $Height) / 3600))) + (0.6 / sqrt(($Weight * $Height) / 3600));
        $RWT = 2 * ($PWTD / $LVEDD);
        $conditions = [];
        $WMSI = number_format(((0.93 - ($LVEF / 100)) / 0.26), 2);
        $condition = "";
        if ($MAP > 105) {
            $conditions[0] = "critical";
        }

        if ($MAP < 105) {
            $conditions[0] = "normal";
        }

        if ($EDV < 86) {
            $conditions[1] = "critical";
        }

        if ($EDV > 86) {
            $conditions[1] = "normal";
        }

        if ($ESV < 26) {
            $conditions[2] = "critical";
        }

        if ($ESV > 26) {
            $conditions[2] = "normal";
        }

        if ($SV < 55) {
            $conditions[3] = "critical";
        }

        if ($SV > 55) {
            $conditions[3] = "normal";
        }

        if ($SVI < 33) {
            $conditions[4] = "critical";
        }

        if ($SVI > 33) {
            $conditions[4] = "normal";
        }

        if ($CO < 4.0) {
            $conditions[5] = "critical";
        }

        if ($CO > 4.0) {
            $conditions[5] = "normal							";
        }

        if ($CI < 2.5) {
            $conditions[6] = "critical";
        }

        if ($CI > 2.5) {
            $conditions[6] = "normal";
        }

        if ($SVR > 15) {
            $conditions[7] = "critical";
        }

        if ($SVR < 15) {
            $conditions[7] = "normal	";
        }

        if ($PVR > 2.5) {
            $conditions[8] = "critical";
        } else if ($PVR < 2.5) {
            $conditions[8] = "normal						";
        }

        if ($CRI > 30) {
            $conditions[9] = "critical";
        }

        if ($CRI < 30) {
            $conditions[9] = "normal	";
        }

        if ($CBF < 0.2) {
            $conditions[10] = "critical";
        }

        if ($CBF > 0.2) {
            $conditions[10] = "normal";
        }

        if ($LVMI > 130) {
            $conditions[11] = "abnormal";
        }

        if ($LVMI < 130) {
            $conditions[11] = "normal";
        }

        if ($RWT >= 0.42) {
            $conditions[12] = "abnormal";
        }

        if ($RWT < 0.42) {
            $conditions[12] = "normal";
        }

        if ($WMS > 2) {
            $conditions[13] = "critical";
        }

        if ($WMS < 2) {
            $conditions[13] = "normal";
        }

        $result = [];
        $result['MAP'] = $MAP;
        $result['EDV'] = $EDV;
        $result['ESV'] = $ESV;
        $result['SV'] = $SV;
        $result['SVI'] = $SVI;
        $result['CO'] = $CO;
        $result['CI'] = $CI;
        // $result['CPP']=$CPP;
        $result['CBF'] = $CBF;
        $result['SVR'] = $SVR;
        $result['PVR'] = $PVR;
        $result['RI'] = $CRI;
        $result['LVMI'] = $LVMI;
        $result['RWT'] = $RWT;
        $result['WMS'] = $WMS;
        $result['LVEF'] = $LVEF;
        $result['conditions'] = $conditions;
        $msg1 = "";
        $msg2 = "";
        $msg3 = "";
        if ($LVMI > 115 && $RWT > 0.42) {
            $msg1 = "Left ventricular hypertrophy (LVH) was concentric hypertrophy";
        }

        if ($LVMI <= 115 && $RWT <= 0.42) {
            $msg1 = "Left ventricular hypertrophy (LVH) was normal (no LVH)";
        }

        if ($LVMI > 115 && $RWT <= 0.42) {
            $msg1 = "Left ventricular hypertrophy (LVH) was eccentric hypertrophy";
        }

        if ($LVMI <= 115 && $RWT > 0.42) {
            $msg1 = "Left ventricular hypertrophy (LVH) was concentric remodeling";
        }

        $LVMIg = "normal range";
        if ($LVMI <= 115) {
            $LVMIg = "normal range";
        }

        if ($LVMI <= 116 && $LVMI >= 131) {
            $LVMIg = "mildly enlarged";
        }

        if ($LVMI >= 132 && $LVMI <= 148) {
            $LVMIg = "Moderately enlarged";
        }

        if ($LVMI >= 149) {
            $LVMIg = "Severely enlarged";
        }

        if ($SVR > 20) {
            $msg2 = "Systemic vascular resistance was critical value (SVR greater than 1.5U) with stenosis.";
        }

        if ($SVR < 20) {
            $msg2 = "Systemic vascular resistance was normal value (SVR smaller than 1.5U) without dilation or stenosis.";
        }

        if ($SVR < 5) {
            $msg2 = "Systemic vascular resistance was critical value (SVR smaller than 0.2U) with dilation.";
        }

        if ($PVR > 3) {
            $msg3 = "Pulmonary vascular resistance was high value with pulmonary vascular disease.";
        }

        if ($PVR < 3) {
            $msg3 = "Pulmonary vascular resistance was normal value without vascular disease.";
        }

        $Grading = "";
        $LS = "";
        if ($LVEF >= 55) {
            $Grading = "Normal (greater than 55%)";
            $LS = "-15% to -25%";
        }

        if ($LVEF >= 40 && $LVEF < 55) {
            $Grading = "Mildly reduced (40% - 55%)";
            $LS = "-15% to -12.5%";
        }

        if ($LVEF >= 30 && $LVEF < 40) {
            $Grading = "Moderately reduced (30% - 40%)";
            $LS = "-12.5% to -8.1%";
        }
        if ($LVEF < 30) {
            $Grading = "Severely reduced (lower than 30%)";
            $LS = "lower than -8%";
        }
        $WG = "";
        $SG = "";
        if ($WMSI < 1.47) {
            $WG = "normal";
        }

        if ($WMSI > 1.47) {
            $WG = "Abnormal";
        }

        if ($WMSI < 1.47) {
            $SG = "normokinetic";
        }

        if ($WMSI > 1.47 && $WMSI < 1.66) {
            $SG = "mild hypokinesia";
        }

        if ($WMSI >= 1.66 && $WMSI <= 2.06) {
            $SG = "hypokinesia";
        }

        if ($WMSI >= 2.06 && $WMSI <= 2.65) {
            $SG = "severe hypokinesia";
        }

        if ($WMSI >= 2.65 && $WMSI <= 4.0) {
            $SG = "akinetic";
        }

        if (auth()->check() && (auth()->user()->panel_type == 3 || auth()->user()->panel_type == 4 || auth()->user()->panel_type == 5)) {

            $SVG = "";
            $PVG = "";

            $msg3 = "Ejection fraction (LVEF = " . (floatval(number_format($LVEF, 2)) + 0) . "%) was $Grading, longitudinal strain (global and regional) = $LS.";

            $msg4 = "Wall motion score index (WMSI = " . (floatval(number_format($WMSI, 2)) + 0) . ") was $WG, is considered $SG.";

            if ($SVR > 15) {
                $SVG = "abnormal";
            }

            if ($SVR < 15) {
                $SVG = "normal";
            }

            $msg5 = "Systemic vascular resistance (SVR = " . (floatval(number_format($SVR, 2)) + 0) . " dyn.s/cm6) was $SVG value, (CO = " . (floatval(number_format($CO, 2)) + 0) . " l/min) and (MAP = " . (floatval(number_format($MAP, 2)) + 0) . " mmHg).";

            if ($PVR > 2.5) {
                $PVG = "abnormal";
            }

            if ($PVR < 2.5) {
                $PVG = "normal";
            }

            $msg6 = "Pulmonary vascular resistance (PVR = " . (floatval(number_format($PVR, 2)) + 0) . " dyn.s/cm6) was $PVG value, (CO = " . (floatval(number_format($CO, 2)) + 0) . " l/min) and (mean PAP = " . (floatval(number_format($PAP, 2)) + 0) . " mmHg)).";
            $msg7 = "";

            if (($LVMI > 115) & ($RWT > 42)) {
                $msg7 = "Left ventricular hypertrophy (LVH) was concentric hypertrophy";
            }

            if (($LVMI < 115) & ($RWT < 42)) {
                $msg7 = "Left ventricular hypertrophy (LVH) was normal (no LVH)";
            }

            if (($LVMI > 115) & ($RWT < 42)) {
                $msg7 = "Left ventricular hypertrophy (LVH) was eccentric hypertrophy";
            }

            if (($LVMI < 115) & ($RWT > 42)) {
                $msg7 = "Left ventricular hypertrophy (LVH) was concentric remodeling";
            }

            $LVMG = "";
            if ($LVMI < 115) {
                $LVMG = "normal value (lower than 115 g/m2) without abnormality.";
            }

            if ($LVMI > 115 && $LVMI < 131) {
                $LVMG = "mildly abnormal.";
            }

            if ($LVMI > 131 && $LVMI < 148) {
                $LVMG = "moderately abnormal.";
            }

            if ($LVMI > 148) {
                $LVMG = "severely abnormal.";
            }

            $msg8 = "Left ventricular mass index (LVMI = " . (floatval(number_format($LVMI, 2)) + 0) . " g/m2) was $LVMG";
            $result['MSG3'] = $msg3;
            $result['MSG4'] = $msg4;
            $result['MSG5'] = $msg5;
            $result['MSG6'] = $msg6;
            $result['MSG7'] = $msg7;
            $result['MSG8'] = $msg8;
            $result['WMSI'] = $WMSI;
            $conditions[13] = $SG;
            $conditions[14] = $Grading;
            $result['conditions'] = $conditions;
            // if(auth()->user()->email == "najafi@vcathlab.com"){
            //     $result['MSG6']="LV size is $LV and RV size is $RV, LA size is $LA and RA size is $RA.";
            //     $result['MSG7']="There was $RWMA RWMA and $LVH LVH.";
            //     $result['MSG8']="$MVP MVP, $MS MS and $MR MR.";
            //     $result['MSG9']="$AS AS and $AI AI.";
            //     $result['MSG10']="$PS PS and $PI PI.";
            //     $result['MSG11']="$TS TS and $TR TR.";
            // }
        }
        $BSA = number_format(sqrt(($Height * $Weight) / 3600), 2);
        $LVMS = number_format($LVMI * $BSA, 2);

        $GLSRS = number_format(0.02 * ($LVEF), 2);

        $TORSION = number_format((0.0365 * ($LVEF)) - 0.0313, 2);

        $AC = number_format($SV / ($SBP - $DBP), 2);

        try{
          if ((auth()->check() && (auth()->user()->email != 'abayatian@vcathlab.com' || auth()->user()->email != 'nkojuri@vcathlab.com' || auth()->user()->email != 'kojuri@vcathlab.com' || auth()->user()->email != 'bayatian@vcathlab.com'))) {
            if ($LCIMT >= $RCIMT) {
                $IMT = $LCIMT;
            } else if ($LCIMT < $RCIMT) {
                $IMT = $RCIMT;
            }

            if ($Sex == 1) {
                $STANIMT = number_format(323.5 + (5.201 * $Age), 2);
                $AGEVASC = ceil(($IMT - 323.5) / 5.201);
            }

            $SDCIMT = number_format(57.24 + (0.9027 * $Age), 2);

            if ($Sex == 0) {
                $STANIMT = 321.7 + (4.971 * $Age);
                $AGEVASC = ceil(($IMT - 321.7) / 4.971);

            }

            $SDCIMT = 54.50 + (0.8256 * $Age);



            if ($IMT <= 400)
            {
                $IMT = $STANIMT;
            }

            $ZSCORE = number_format(($IMT - $STANIMT) / $SDCIMT,2);

            $IMT = $IMT / 1000;

            if ($Sex == 1) {
                if ($Age <= 44) {
                    $PERCEN = -1754.2 * (pow($IMT, 3)) + 2862.2 * (pow($IMT, 2)) - 1217.8 * (pow($IMT, 1)) + 137.87;
                }
            }

            if ($Age >= 45 && $Age <= 54) {
                $PERCEN = -902.28 * (pow($IMT, 3)) + 1592.4 * (pow($IMT, 2)) - 653.8 * (pow($IMT, 1)) + 54.426;
            }

            if ($Age >= 55 && $Age <= 64) {
                $PERCEN = -83.929 * (pow($IMT, 3)) + 38.14 * (pow($IMT, 2)) + 265.25 * (pow($IMT, 1)) - 130.68;
            }

            if ($Age >= 65 && $Age <= 74) {
                $PERCEN = -130.88 * (pow($IMT, 3)) + 224.45 * (pow($IMT, 2)) + 73.473 * (pow($IMT, 1)) - 90.41;
            }

            if ($Age >= 75) {
                $PERCEN = -214.27 * (pow($IMT, 3)) + 586.5 * (pow($IMT, 2)) - 370.96 * (pow($IMT, 1)) + 54.773;
            }

            if ($Sex == 0) {
                if ($Age <= 44) {
                    $PERCEN = -2539.1 * (pow($IMT, 3)) + 3972.4 * (pow($IMT, 2)) - 1704.9 * (pow($IMT, 1)) + 211.36;
                }
            }

            if ($Age >= 45 & $Age <= 54) {
                $PERCEN = -1005.2 * (pow($IMT, 3)) + 1726.3 * (pow($IMT, 2)) - 710.18 * (pow($IMT, 1)) + 70.124;
            }

            if ($Age >= 55 & $Age <= 64) {
                $PERCEN = -315.41 * (pow($IMT, 3)) + 446.51 * (pow($IMT, 2)) + 58.008 * (pow($IMT, 1)) - 92.264;
            }

            if ($Age >= 65 & $Age <= 74) {
                $PERCEN = -347.35 * (pow($IMT, 3)) + 707.68 * (pow($IMT, 2)) - 270.91 * (pow($IMT, 1)) + 0.6279;
            }

            if ($Age >= 75) {
                $PERCEN = -211.5 * (pow($IMT, 3)) + 580.43 * (pow($IMT, 2)) - 372.44 * (pow($IMT, 1)) + 62.551;
            }
            $STANIMT = number_format($STANIMT, 2);
            $SDCIMT = number_format($SDCIMT, 2);
            if ($PERCEN < 1)
                $PERCEN = 2.5;
            $PERCEN=number_format($PERCEN,2);
            $IMT = $IMT * 1000;
        }
        }catch(\Exception $e){
        
        }

        $data['result'] = $result;
        if (isset($data['AS'])) {
            $data['ASA'] = $data['AS'];
            unset($data['AS']);
        }
        $echo = EchoCalculation::firstOrCreate($data);
        $AOVMSG = "";
        if ((isset($MG) && $MG) && (isset($PG) && $PG)) {
            $AOVMSG = "(MG= $MG mmHg, PG=$PG mmHg)";
        }
        $TRVMSG = "";
        if ((isset($TRG) && $TRG) && (isset($PASP) && $PASP)) {

            $TRVMSG = "(TRG = $TRG  mmHg, PASP = ${PASP}  mmHg)";
        }
        if (auth()->check() && auth()->user()->panel_type == 6) {
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo-template4.docx"));
            // }
            $result['Name'] = $echo->patient->name;
            $result['Age'] = $echo->patient->age;
            // $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo_najafi.docx"));

        } else if (!auth()->check() || (auth()->check() && auth()->user()->email == "kojuri@vcathlab.com")) {
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo-kojuri.docx"));
        } else if (auth()->check() && (auth()->user()->panel_type == 3 || auth()->user()->panel_type == 4)) {
            // if(auth()->user()->panel_type == 4){
            //     $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo_najafi.docx"));
            // }else{
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo_ghasemi.docx"));
            // }
            $result['Name'] = $echo->patient->name;
            $result['Age'] = $echo->patient->age;
        } else if (auth()->check() && (auth()->user()->panel_type == 5 || auth()->user()->panel_type == 6)) {
            // if(auth()->user()->panel_type == 4){
            //     $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo_najafi.docx"));
            // }else{

            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo-template4.docx"));
            // }
            $result['Name'] = $echo->patient->name;
            $result['Age'] = $echo->patient->age;
        } else {

            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo.docx"));

            $result['FirstMsg'] = $msg1;
            $result['SecondMsg'] = $msg2;
            $result['ThirdMsg'] = $msg3;
            $template->setValue("FirstMsg", $msg1);
            $template->setValue("SecondMsg", $msg2);
            $template->setValue("ThirdMsg", $msg3);
        }

        foreach ($template->getVariables() as $item) {
            if (isset($result[$item])) {
                $template->setValue($item, (is_numeric($result[$item]) && !in_array($item, ["Age", "LVEF"]) ? number_format($result[$item], 2) : $result[$item]));
            } else if (isset($$item)) {
                $template->setValue($item, $$item);
            }
        }
        foreach ($result['conditions'] as $key => $value) {
            $template->setValue("Condition_" . $key, $value);
        }

        $filename = "ECHO_" . $echo->id . "_" . time() . ".docx";
        $result['filename'] = $filename;
        $result['link'] = "https://docs.google.com/viewerng/viewer?url=" . url('/storage/echo_calculations/' . $filename);
        $result['word_link'] = url('/storage/echo_calculations/' . $filename);
        $echo->result = $result;
        $echo->save();
        if (!file_exists(storage_path("app/public/echo_calculations"))) {
            mkdir(storage_path("app/public/echo_calculations"));
        }
        $template->saveAs(storage_path("app/public/echo_calculations/" . $filename));
        return [
            'ok' => true,
            'data' => [
                'echo' => $echo,
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/echo_calculations/' . $filename),
                'word_link' => url('/storage/echo_calculations/' . $filename),
                'result' => $result,
            ],
        ];
    }

    /**
     * Display the specified EchoCalculation.
     * GET|HEAD /echoCalculations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EchoCalculation $echoCalculation */
        $echoCalculation = $this->echoCalculationRepository->find($id);
        // $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/echo.docx"));
        // foreach($echoCalculation->result as $key=>$item){
        //     $template->setValue($key,$item);
        // }
        $filename = $echoCalculation->result['filename'];
        // if(!file_exists(storage_path("app/public/echo_calculations"))){
        //     mkdir(storage_path("app/public/echo_calculations"));
        // }
        // $template->saveAs(storage_path("app/public/echo_calculations/".$filename));
        if (empty($echoCalculation)) {
            return $this->sendError('Echo Calculation not found');
        }
        $arr = $echoCalculation->toArray();
        $arr['link'] = "https://docs.google.com/viewerng/viewer?url=" . url('/storage/echo_calculations/' . $filename);
        $arr['word_link'] = url('/storage/echo_calculations/' . $filename);
        return $this->sendResponse($arr, 'Echo Calculation retrieved successfully');
    }

    /**
     * Update the specified EchoCalculation in storage.
     * PUT/PATCH /echoCalculations/{id}
     *
     * @param int $id
     * @param UpdateEchoCalculationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEchoCalculationAPIRequest $request)
    {
        $input = $request->all();

        /** @var EchoCalculation $echoCalculation */
        $echoCalculation = $this->echoCalculationRepository->find($id);

        if (empty($echoCalculation)) {
            return $this->sendError('Echo Calculation not found');
        }

        $echoCalculation = $this->echoCalculationRepository->update($input, $id);

        return $this->sendResponse($echoCalculation->toArray(), 'EchoCalculation updated successfully');
    }

    /**
     * Remove the specified EchoCalculation from storage.
     * DELETE /echoCalculations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EchoCalculation $echoCalculation */
        $echoCalculation = $this->echoCalculationRepository->find($id);

        if (empty($echoCalculation)) {
            return $this->sendError('Echo Calculation not found');
        }

        $echoCalculation->delete();

        return $this->sendSuccess('Echo Calculation deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit = $request->get('limit', 10);
        $echoCalculationsCount = $this->echoCalculationRepository->count();
        return $this->sendResponse(['count' => $echoCalculationsCount, 'total_pages' => ceil($echoCalculationsCount / $limit)], 'Echo Calculations Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids = $request->get("ids");
        return $this->sendResponse(['count' => $this->echoCalculationRepository->multiDelete($ids)], 'Selected Echo Calculations Deleted');
    }
    public function export()
    {
        return $this->echoCalculationRepository->export()->download("Echo Calculations-" . date("Y-m-d") . ".xlsx");
    }
}
