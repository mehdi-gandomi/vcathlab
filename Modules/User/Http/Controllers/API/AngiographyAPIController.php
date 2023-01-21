<?php

namespace Modules\User\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\API\CreateAngiographyAPIRequest;
use Modules\User\Http\Requests\API\UpdateAngiographyAPIRequest;
use Modules\User\Models\Angiography;
use Modules\User\Repositories\AngiographyRepository;
use Response;

/**
 * Class AngiographyController
 * @package Modules\User\Http\Controllers\API
 */

class AngiographyAPIController extends AppBaseController
{
    /** @var  AngiographyRepository */
    private $angiographyRepository;

    public function __construct(AngiographyRepository $angiographyRepo)
    {
        $this->angiographyRepository = $angiographyRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the Angiography.
     * GET|HEAD /angiographies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $angiographies = $this->angiographyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit = $request->get('limit', 10);
        $angiographiesCount = $this->angiographyRepository->count();
        return $this->sendResponse(['pagination_data' => ['count' => $angiographiesCount, 'total_pages' => ceil($angiographiesCount / $limit)], 'items' => $angiographies->toArray()], 'Angiographies retrieved successfully');
    }

    /**
     * Store a newly created Angiography in storage.
     * POST /angiographies
     *
     * @param CreateAngiographyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAngiographyAPIRequest $request)
    {
        $data = $request->all();
        $data['user_id']=auth()->user()->id;
        $angiography = $this->angiographyRepository->create($data);


        ["Cr" => $Cr, "Ht" => $Ht,"Plt" => $Plt, "LVEF" => $LVEF, "HR" => $HR, "Contrast" => $Contrast, "Hb" => $Hb, "PTP" => $PTP, "CAVI" => $CAVI, "WBC" => $WBC, "HbA1C" => $HbA1C, "patient_id" => $patient_id, "Age" => $Age, "SBP" => $SBP, "DBP" => $DBP, "Height" => $Height, "Weight" => $Weight, "Sex" => $Sex, "pribleed" => $pribleed, "Hypotension" => $Hypotension, "heart_failure" => $CHF, "Diabet" => $Diabet, "Acute_MI" => $Acute_MI, "IABP" => $IABP, "Smoker" => $Smoker, "Weight" => $Weight, "Height" => $Height, "PriorCABG" => $PriorCABG, "PriorPCI" => $PriorPCI] = $data;

        if ($Hb < 11.5) {
            $CondHb = "Low";
        }

        if ($Hb >= 11.5 && $Hb <= 17) {
            $CondHb = "normal";
        }

        if ($Hb > 17) {
            $CondHb = "High";
        }

        if ($Plt < 150000) {
            $CondPlt = "Low";
        }

        if ($Plt >= 150000 && $Plt <= 450000) {
            $CondPlt = "normal";
        }

        if ($Plt > 450000) {
            $CondPlt = "High";
        }

        if ($Cr < 0.5) {
            $CondCr = "normal";
        }

        if ($Cr >= 0.5 && $Cr <= 1.25) {
            $CondCr = "normal";
        }

        if ($Cr > 1.25) {
            $CondCr = "High";
        }

        if ($Sex == 1) {
            $GFR = 186.3 * pow($Cr, -1.154) * pow($Age, -0.203);
        }

        if ($Sex == 0) {
            $GFR = 186.3 * pow($Cr, -1.154) * pow($Age, -0.203) * 0.742;
        }

        if ($GFR >= 90) {
            $CondGFR = "normal";
        }

        if ($GFR >= 60 && $GFR <= 89) {
            $CondGFR = "mildly decreased";
        }

        if ($GFR >= 45 && $GFR <= 59) {
            $CondGFR = "mildly to moderately decreased";
        }

        if ($GFR >= 30 && $GFR <= 44) {
            $CondGFR = "moderately to severely decreased";
        }

        if ($GFR >= 15 && $GFR <= 29) {
            $CondGFR = "severely decreased";
        }

        if ($GFR < 15) {
            $CondGFR = "Kidney failure";
        }

        if ($Sex == 1) {
            $CCr = ((140 - $Age) * $Weight) / ($Cr * 72);
        }

        if ($Sex == 0) {
            $CCr = ((140 - $Age) * $Weight) / ($Cr * 72) * 0.85;
        }

        if ($CCr < 88) {
            $CondCCr = "low";
        }

        if ($CCr >= 88 && $CCr <= 137) {
            $CondCCr = "normal";
        }

        if ($CCr > 137) {
            $CondCCr = "normal";
        }

        if ($Hypotension == 1) {
            $Hypo = 5;
        }

        if ($Hypotension == 0) {
            $Hypo = 0;
        }

        if ($IABP == 1) {
            $IABP = 5;
        }

        if ($IABP == 0) {
            $IABP = 0;
        }

        if ($Smoker == 1) {
            $SMOK = 1;
        }

        if ($Smoker == 0) {
            $SMOK = 0;
        }

        if ($CHF == 1) {
            $CHF = 5;
        }

        if ($CHF == 0) {
            $CHF = 0;
        }

        if ($Age > 75) {
            $AgeCIN = 4;
        }

        if ($Age <= 75) {
            $AgeCIN = 0;
        }

        if ($Ht > 36) {
            $HtCIN = 0;
        }

        if ($Ht <= 36) {
            $HtCIN = 3;
        }

        if ($Acute_MI == 1) {
            $Acute_MI_PARIS = 2;
        }

        if ($Acute_MI == 0) {
            $Acute_MI_PARIS = 0;
        }

        if ($Diabet == 1) {
            $Diabet = 3;
            $Diabet_PARIS = 3;
        }

        if ($Diabet == 0) {
            $Diabet = 0;

            $Diabet_PARIS = 0;
        }

        if ($GFR >= 60) {
            $GFR_CIN = 0;
        }

        if ($GFR > 40 && $GFR < 60) {
            $GFR_CIN = 2;
        }

        if ($GFR > 20 && $GFR <= 40) {
            $GFR_CIN = 4;
        }

        if ($GFR <= 20) {
            $GFR_CIN = 6;
        }

        if ($PriorPCI == 1) {
            $PriorPCI_PARIS = 2;
        }

        if ($PriorPCI == 0) {
            $PriorPCI_PARIS = 0;
        }

        if ($PriorCABG == 1) {
            $PriorCABG_PARIS = 2;
        }

        if ($PriorCABG == 0) {
            $PriorCABG_PARIS = 0;
        }

        if ($CCr > 60) {
            $CCr_PARIS = 0;
        }

        if ($CCr <= 60) {
            $CCr_PARIS = 2;
        }
        $CCr_point = -0.25 * $CCr + 25;
        $Age_point_DAPT = 0.47 * $Age - 23.5;

        if ($Age < 50) {
            $Age_point_DAPT = 0;
        }
        $WBC=$WBC/1000;
        $WBC_point = $WBC - 5;

        if ($WBC < 5) {
            $WBC_point = 0;
        }
        $Hb_point = -7.4 * $Hb + 88.8;

        if ($Hb > 12) {
            $Hb_point = 0;
        }

        $Cont = 0.01 * $Contrast;
        if ($pribleed == 1) {
            $pribleed_point = 26;
        }

        if ($pribleed == 0) {
            $pribleed_point = 0;


        }
        $point_PRECISE_DAPT = $Hb_point + $WBC_point + $Age_point_DAPT + $CCr_point + $pribleed_point;

        $point_CIN = $GFR_CIN + $Diabet + $HtCIN + $AgeCIN + $IABP + $CHF + $Hypo + $Cont;

        $PARIS = $Diabet_PARIS + $Acute_MI_PARIS + $SMOK + $CCr_PARIS + $PriorPCI_PARIS + $PriorCABG_PARIS;

        $CIN_Risk = 0.155 * pow($point_CIN, 2) - 0.206 * pow($point_CIN, 1) + 5.023;

        $CIN_DIALYSIS = 0.0108 * exp(0.3616 * $point_CIN);

        $MACD = 5 * ($Weight / $Cr);
        if ($point_CIN <= 6) {
            $Cond_CINRisk = "normal";

            $Cond_DIALYSIS = "normal";
        }

        if ($point_CIN > 6 && $point_CIN <= 15) {
            $Cond_CINRisk = "moderate";

            $Cond_DIALYSIS = "moderate";
        }

        if ($point_CIN >= 16) {
            $Cond_CINRisk = "critical";

            $Cond_DIALYSIS = "critical";
        }

        if ($point_PRECISE_DAPT < 25) {
            $point_DAPT = "low";
        }

        if ($point_PRECISE_DAPT >= 25) {
            $point_DAPT = "high";
        }

        if ($PARIS <= 2) {
            $point_PARIS = "low";
        }

        if ($PARIS >= 3 && $PARIS < 5) {
            $point_PARIS = "Intermediate";
        }

        if ($PARIS >= 5) {
            $point_PARIS = "high";
        }

        if ($PTP < 50) {
            $Cond_PTP = "low";
        }

        if ($PTP >= 50 && $PTP <= 80) {
            $Cond_PTP = "moderate";
        }

        if ($PTP > 80) {
            $Cond_PTP = "high";


        }
        $MAAP = $DBP + ((0.3333) + $HR * (0.0012)) * ($SBP - $DBP);

        $EF = $LVEF / 100;

        $CO = 63 * ((1 / (1 - $EF)) - 1) * $HR / 1000;

        $CI = $CO / sqrt(($Height * $Weight) / 3600);

        $SVRR = $MAAP / $CO;

        if ($CO < 4) {
            $Cond_CO = "low";
        }

        if ($CO >= 4) {
            $Cond_CO = "normal";
        }

        if ($CI < 2.5) {
            $Cond_CI = "low";
        }

        if ($CI >= 2.5) {
            $Cond_CI = "normal";
        }

        if ($SVRR > 20) {
            $Cond_SVRR = "high";
        }

        if ($SVRR <= 20) {
            $Cond_SVRR = "normal";
        }

        if ($LVEF >= 55) {
            $Grade_EF = "normal";
        }

        if ($LVEF >= 40 && $LVEF < 55) {
            $Grade_EF = "mildly reduced";
        }

        if ($LVEF >= 30 && $LVEF < 40) {
            $Grade_EF = "moderately reduced";
        }

        if ($LVEF < 30) {
            $Grade_EF = "severely reduced";
        }

        if ($CAVI <= 8) {
            $Cond_CAVI = "normal";
        }

        if ($CAVI > 8 && $CAVI <= 9) {
            $Cond_CAVI = "Intermediate";
        }

        if ($CAVI > 9) {
            $Cond_CAVI = "high";
        }

        if ($Cr <= 2) {
            $ACEF = $Age / $LVEF;
        }

        if ($Cr > 2) {
            $ACEF = ($Age / $LVEF) + 1;
        }

        if ($ACEF <= 1.43) {
            $Cond_ACEF = "low";
        }

        if ($ACEF > 1.43) {
            $Cond_ACEF = "high";
        }

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/Angio-risk.docx"));
        foreach ($template->getVariables() as $item) {
            if (isset($$item)) {
                $template->setValue($item, is_numeric($$item) ? (floatval(number_format($$item,2)) + 0):$$item);
            }
        }
        $template->setValue("name", $angiography->patient->name);
        $template->setValue("age", $angiography->patient->age);
        $template->setValue("sex", ($angiography->patient->sex == 1 ? "Male":"Female"));
        $filename = "ANGIO_" . $angiography->id . "_" . time() . ".docx";
        if (!file_exists(storage_path("app/public/angiographies"))) {
            mkdir(storage_path("app/public/angiographies"));
        }
        $template->saveAs(storage_path("app/public/angiographies/" . $filename));

        return [
            'ok' => true,
            'data'=>[
                'link'=>"https://docs.google.com/viewerng/viewer?url=".url('/storage/angiographies/'.$filename),
                'word_link'=>url('/storage/angiographies/'.$filename),
                'angiography'=>$angiography
            ]
        ];
    }

    /**
     * Display the specified Angiography.
     * GET|HEAD /angiographies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Angiography $angiography */
        $angiography = $this->angiographyRepository->find($id);

        if (empty($angiography)) {
            return $this->sendError('Angiography not found');
        }

        return $this->sendResponse($angiography->toArray(), 'Angiography retrieved successfully');
    }

    /**
     * Update the specified Angiography in storage.
     * PUT/PATCH /angiographies/{id}
     *
     * @param int $id
     * @param UpdateAngiographyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAngiographyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Angiography $angiography */
        $angiography = $this->angiographyRepository->find($id);

        if (empty($angiography)) {
            return $this->sendError('Angiography not found');
        }

        $angiography = $this->angiographyRepository->update($input, $id);

        return $this->sendResponse($angiography->toArray(), 'Angiography updated successfully');
    }

    /**
     * Remove the specified Angiography from storage.
     * DELETE /angiographies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Angiography $angiography */
        $angiography = $this->angiographyRepository->find($id);

        if (empty($angiography)) {
            return $this->sendError('Angiography not found');
        }

        $angiography->delete();

        return $this->sendSuccess('Angiography deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit = $request->get('limit', 10);
        $angiographiesCount = $this->angiographyRepository->count();
        return $this->sendResponse(['count' => $angiographiesCount, 'total_pages' => ceil($angiographiesCount / $limit)], 'Angiographies Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids = $request->get("ids");
        return $this->sendResponse(['count' => $this->angiographyRepository->multiDelete($ids)], 'Selected Angiographies Deleted');
    }
    public function export()
    {
        return $this->angiographyRepository->export()->download("Angiographies-" . date("Y-m-d") . ".xlsx");
    }
}
