<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateBodyCompositionAPIRequest;
use Modules\User\Http\Requests\API\UpdateBodyCompositionAPIRequest;
use Modules\User\Models\BodyComposition;
use Modules\User\Repositories\BodyCompositionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BodyCompositionController
 * @package Modules\User\Http\Controllers\API
 */

class BodyCompositionAPIController extends AppBaseController
{
    /** @var  BodyCompositionRepository */
    private $bodyCompositionRepository;

    public function __construct(BodyCompositionRepository $bodyCompositionRepo)
    {
        $this->bodyCompositionRepository = $bodyCompositionRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the BodyComposition.
     * GET|HEAD /bodyCompositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bodyCompositions = $this->bodyCompositionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $bodyCompositionsCount = $this->bodyCompositionRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$bodyCompositionsCount,'total_pages'=>ceil($bodyCompositionsCount/$limit)],'items'=>$bodyCompositions->toArray()], 'Body Compositions retrieved successfully');
    }

    /**
     * Store a newly created BodyComposition in storage.
     * POST /bodyCompositions
     *
     * @param CreateBodyCompositionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBodyCompositionAPIRequest $request)
    {
        $input = $request->all();

        $bodyComposition = $this->bodyCompositionRepository->create($input);

        return $this->sendResponse($bodyComposition->toArray(), 'Body Composition saved successfully');
    }

    /**
     * Display the specified BodyComposition.
     * GET|HEAD /bodyCompositions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }
        $data=$bodyComposition->toArray();
        $data['user_id'] = auth()->user()->id;
        ["Age" => $Age,"BFMP"=>$BFMP,"SMM"=>$SMM, "Height" => $Height,'VFP'=>$VFP, "Weight" => $Weight,  "Hip" => $Hip, "Waist"=>$Waist,"Sex" => $Sex, "Weight" => $Weight, "Height" => $Height] = $data;


        $BMI = $Weight / (pow(($Height / 100), 2));


        if ($BMI <= 18.5) {
            $ConBMI = "Under Weight";
        }

        if ($BMI > 18.5 && $BMI <= 24.9) {
            $ConBMI = "Normal";
        }

        if ($BMI > 25 && $BMI <= 29.9) {
            $ConBMI = "Over Weight";
        }

        if ($BMI > 30 && $BMI <= 34.9) {
            $ConBMI = "Obesity (Class I)";
        }

        if ($BMI > 35 && $BMI <= 39.9) {
            $ConBMI = "Obesity (Class II)";
        }

        if ($BMI > 40) {
            $ConBMI = "Extreme Obesity";
        }


        //___________________________________________


        $BSA = sqrt($Weight * $Height / 3600);


        //____________________________________________


        if($BFMP){
            $BFMP=$BFMP;
        }else{
            $BFMP = (1.20 * $BMI) + (0.23 * $Age) - 16.2;
        }

        $BFM = $BFMP * $Weight / 100;
        $WOMAN_BFM=0.24*$Weight;
        $MAN_BFM2=0.17*$Weight;
        if ($BFMP <= 13) {
            $Cond_BFMP = "Essential Fat";
        }

        if ($BFMP > 13 && $BFMP <= 20) {
            $Cond_BFMP = "Athletes";
        }

        if ($BFMP > 20 && $BFMP <= 24) {
            $Cond_BFMP = "Fitness";
        }

        if ($BFMP >= 25 && $BFMP <= 30) {
            $Cond_BFMP = "AverAge";
        }

        if ($BFMP > 30) {
            $Cond_BFMP = "Obese";
        }


        //____________________________________________

        if ($Sex == 0) {
            $Fat_control = $BFMP - 25;
        }

        if ($Sex == 1) {
            $Fat_control = $BFMP - 19;
        }

        //____________________________________________


        $TBW = 2.447 - 0.09156 * $Age + 0.1074 * $Height + 0.3362 * $Weight;

        $TBWP = ($TBW / $Weight)*100;
        $WOMAN_TBW=0.60*$Weight;
        $MAN_TBW=0.65*$Weight;

        if ($TBWP <= 45) {
            $Cond_TBWP = "Under";
        }

        if ($TBWP > 45 && $TBWP <= 65) {
            $Cond_TBWP = "Normal";
        }

        if ($TBWP > 65) {
            $Cond_TBWP = "Over";
        }


        //____________________________________________


        $LBM = 0.407 * $Weight + 0.267 * $Height - 19.2;

        if ($LBM <= 45) {
            $Cond_LBM = "Under";
        }

        if($LBM >= 45)
        {
           $Cond_LBM = "Normal";
        }


        //____________________________________________

        if($SMM){
            $SMM=$SMM;
        }else{
            $SMM = ((pow($Height, 2)) / ($BFM * 2.2) * 0.401) + (($Sex * 3.825) - ($Age * 0.071)) + 5.102;
        }
        $MASC=$SMM-35;
        //____________________________________________


        if ($Sex == 1) {
            $Ideal_weight = 45.5 + (0.91 * ($Height - 152.4));
        }
        if ($Sex == 0) {
            $Ideal_weight = 50.0 + (0.91 * ($Height - 152.4));
        }

        $Difweight = $Weight - $Ideal_weight;

        //____________________________________________

        $PRT = 0.150 * $Weight;

        $MIN = 0.052 * $Weight;

        $ICW = 0.631 * $TBW;

        $ECW = 0.368 * $TBW;

        //____________________________________________

        $FFM = $Weight * (1 - ($BFMP / 100));

        //____________________________________________
        $MACE = (0.0049*(pow($BMI,2)) - 0.1681*($BMI) + 8.7658)/8;

        $ASCVD = (0.1015*($BMI) + 0.2728)/8;

        $MI = (0.0031*(pow($BMI,2)) - 0.0714*($BMI) + 3.6101)/8;

        $STROKE = (0.0013*(pow($BMI,2)) - 0.0546*($BMI) + 1.7221)/8;

        $ACM = (0.0026*(pow($BMI,2)) - 0.0722*($BMI) + 5.023)/8;

        $HRF = (0.0038*(pow($BMI,2)) - 0.1186*($BMI) + 2.1011)/8;

        $WHP=$Waist / $Hip;
        $WHR=$Waist / $Height;
        if ($Sex == 1) {
            $BMR = 88.362 + (13.397 * $Weight) + (4.799 * $Height) - (5.677 * $Age);
        }

        if ($Sex == 0) {
            $BMR = 447.593 + (9.247 * $Weight) + (3.098 * $Height) - (4.330 * $Age);
        }

        //____________________________________________


        if ($Sex == 1) {
            $BEE = 66.5 + (13.75 * $Weight) + (5.003 * $Height) - (6.775 * $Age);
        }

        if ($Sex == 0) {
            $BEE = 655.1 + (9.563 * $Weight) + (1.850 * $Height) - (4.676 * $Age);
        }
        $Date=date("Y-m-d");
        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/BodyComposition.docx"));
        foreach ($template->getVariables() as $item) {
            if (isset($$item)) {
                $template->setValue($item, (is_numeric($$item) && $item != "BEE" && $item != "BMR") ? (floatval(number_format($$item,2)) + 0):($item == "BEE" || $item == "BMR") ? number_format($$item,1,'.',''):$$item);
            }
        }
        $template->setValue("MAN_BFM", $MAN_BFM2);
        $template->setValue("WOMAN_TBW", $WOMAN_TBW);
        $template->setValue("MAN_TBW", $MAN_TBW);
        $template->setValue("name", $bodyComposition->patient->name);
        $template->setValue("age", $bodyComposition->patient->age);
        $template->setValue("sex", ($bodyComposition->patient->sex == 1 ? "Male":"Female"));
        $filename = "BODY_" . $bodyComposition->id . "_" . time() . ".docx";
        if (!file_exists(storage_path("app/public/body_compositions"))) {
            mkdir(storage_path("app/public/body_compositions"));
        }
        $template->saveAs(storage_path("app/public/body_compositions/" . $filename));


       $data['result']=[
        'link'=>"https://docs.google.com/viewerng/viewer?url=".url('/storage/body_compositions/'.$filename),
        'word_link'=>url('/storage/body_compositions/'.$filename)
       ];
        return $this->sendResponse($data, 'Body Composition retrieved successfully');
    }

    /**
     * Update the specified BodyComposition in storage.
     * PUT/PATCH /bodyCompositions/{id}
     *
     * @param int $id
     * @param UpdateBodyCompositionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBodyCompositionAPIRequest $request)
    {
        $input = $request->all();

        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }

        $bodyComposition = $this->bodyCompositionRepository->update($input, $id);

        return $this->sendResponse($bodyComposition->toArray(), 'BodyComposition updated successfully');
    }

    /**
     * Remove the specified BodyComposition from storage.
     * DELETE /bodyCompositions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BodyComposition $bodyComposition */
        $bodyComposition = $this->bodyCompositionRepository->find($id);

        if (empty($bodyComposition)) {
            return $this->sendError('Body Composition not found');
        }

        $bodyComposition->delete();

        return $this->sendSuccess('Body Composition deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $bodyCompositionsCount = $this->bodyCompositionRepository->count();
        return $this->sendResponse(['count'=>$bodyCompositionsCount,'total_pages'=>ceil($bodyCompositionsCount/$limit)], 'Body Compositions Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->bodyCompositionRepository->multiDelete($ids)], 'Selected Body Compositions Deleted');
    }
    public function export()
    {
        return $this->bodyCompositionRepository->export()->download("Body Compositions-".date("Y-m-d").".xlsx");
    }
}
