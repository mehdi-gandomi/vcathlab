<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateImtCalculationAPIRequest;
use Modules\User\Http\Requests\API\UpdateImtCalculationAPIRequest;
use Modules\User\Models\ImtCalculation;
use Modules\User\Repositories\ImtCalculationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\User\Models\Patient;
use Response;

/**
 * Class ImtCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class ImtCalculationAPIController extends AppBaseController
{
    /** @var  ImtCalculationRepository */
    private $imtCalculationRepository;

    public function __construct(ImtCalculationRepository $imtCalculationRepo)
    {
        $this->imtCalculationRepository = $imtCalculationRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the ImtCalculation.
     * GET|HEAD /imtCalculations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $imtCalculations = $this->imtCalculationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        $imtCalculationsCount = $this->imtCalculationRepository->count();
        return $this->sendResponse(['pagination_data'=>['count'=>$imtCalculationsCount,'total_pages'=>ceil($imtCalculationsCount/$limit)],'items'=>$imtCalculations->toArray()], 'Imt Calculations retrieved successfully');
    }

    /**
     * Store a newly created ImtCalculation in storage.
     * POST /imtCalculations
     *
     * @param CreateImtCalculationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImtCalculationAPIRequest $request)
    {
        $data = $request->validate([
            'patient_id' => 'nullable',
            'LCIMT' => "sometimes",
            'RCIMT' => "sometimes",
            'Age' => "sometimes",
            'Sex' => "sometimes",
            'name'=>'sometimes'
        ]);
        $input = $request->all();
        ['LCIMT' => $LCIMT,'RCIMT'=>$RCIMT,'Age'=>$Age,'Sex'=>$Sex,'RICA'=>$RICA,'RECA'=>$RECA,'RCCA'=>$RCCA,'LICA'=>$LICA,'LECA'=>$LECA,'LCCA'=>$LCCA] = $input;

        if(!isset($data['patient_id'])){
            $patientData=[
                'name'=>$data['name'],
                'age'=>$data['Age'],
                'sex'=>$data['Sex']
            ];
            if(isset($input['code'])){
            $patientData['code']    =$input['code'];
            }
            $patient=Patient::firstOrCreate($patientData);
            $input['patient_id']=$patient->id;

        }

        if ($LCIMT >= $RCIMT) {
            $IMT = $LCIMT;
        } else if ($LCIMT < $RCIMT) {
            $IMT = $RCIMT;
        }

        if ($Sex == 1) {
            $STANIMT = number_format(323.5 + (5.201 * $Age), 2);
            $AGEVASC = abs(ceil(($IMT - 323.5) / 5.201));
        }

        $SDCIMT = number_format(57.24 + (0.9027 * $Age), 2);

        if ($Sex == 0) {
            $STANIMT = 321.7 + (4.971 * $Age);
            $AGEVASC = abs(ceil(($IMT - 321.7) / 4.971));

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
        //
        $input['user_id']=auth()->user()->id;
        $patient=Patient::find($input['patient_id']);
        $imtCalculation = $this->imtCalculationRepository->create($input);

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/carotid-intima-media-thickness.docx"));

        $template->setValue("Age",$Age);
        $template->setValue("Name",$patient->name);
        foreach ($template->getVariables() as $item) {
           if (isset($$item) && $$item) {
                $template->setValue($item, $$item);
            }
        }
        $template->setValue("Sex",($Sex == 1 ? "Male":"Female"));
        $filename = "IMT_" . $imtCalculation->id . "_" . time() . ".docx";
        if (!file_exists(storage_path("app/public/imt_calculations"))) {
            mkdir(storage_path("app/public/imt_calculations"));
        }
        $template->saveAs(storage_path("app/public/imt_calculations/" . $filename));
        return [
            'ok' => true,
            'data' => [
                'imt' => $imtCalculation,
                'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/imt_calculations/' . $filename),
                'word_link' => url('/storage/imt_calculations/' . $filename),
                // 'result' => $result,
            ],
        ];
        return $this->sendResponse($imtCalculation->toArray(), 'Imt Calculation saved successfully');
    }

    /**
     * Display the specified ImtCalculation.
     * GET|HEAD /imtCalculations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ImtCalculation $imtCalculation */
        $imtCalculation = $this->imtCalculationRepository->find($id);

        if (empty($imtCalculation)) {
            return $this->sendError('Imt Calculation not found');
        }
        $input = $imtCalculation->toArray();
        ['LCIMT' => $LCIMT,'RCIMT'=>$RCIMT,'RICA'=>$RICA,'RECA'=>$RECA,'RCCA'=>$RCCA,'LICA'=>$LICA,'LECA'=>$LECA,'LCCA'=>$LCCA] = $input;

        $patient=Patient::find($imtCalculation->patient_id);
        $Sex=$patient->sex;
        $Age=$patient->age;

        if ($LCIMT >= $RCIMT) {
            $IMT = $LCIMT;
        } else if ($LCIMT < $RCIMT) {
            $IMT = $RCIMT;
        }

        if ($Sex == 1) {
            $STANIMT = number_format(323.5 + (5.201 * $Age), 2);
            $AGEVASC = abs(ceil(($IMT - 323.5) / 5.201));
        }

        $SDCIMT = number_format(57.24 + (0.9027 * $Age), 2);

        if ($Sex == 0) {
            $STANIMT = 321.7 + (4.971 * $Age);
            $AGEVASC = abs(ceil(($IMT - 321.7) / 4.971));

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
        //

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/carotid-intima-media-thickness.docx"));

        $template->setValue("Age",$Age);
        $template->setValue("Name",$patient->name);
        foreach ($template->getVariables() as $item) {
           if (isset($$item) && $$item) {
                $template->setValue($item, $$item);
            }
        }
        $template->setValue("Sex",($Sex == 1 ? "Male":"Female"));
        $filename = "IMT_" . $imtCalculation->id . "_" . time() . ".docx";
        if (!file_exists(storage_path("app/public/imt_calculations"))) {
            mkdir(storage_path("app/public/imt_calculations"));
        }
        $template->saveAs(storage_path("app/public/imt_calculations/" . $filename));
        $data=$input;
        $data['result']=[
            'link' => "https://docs.google.com/viewerng/viewer?url=" . url('/storage/imt_calculations/' . $filename),
                'word_link' => url('/storage/imt_calculations/' . $filename),
           ];
        return $this->sendResponse($data, 'Imt Calculation retrieved successfully');
    }

    /**
     * Update the specified ImtCalculation in storage.
     * PUT/PATCH /imtCalculations/{id}
     *
     * @param int $id
     * @param UpdateImtCalculationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImtCalculationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ImtCalculation $imtCalculation */
        $imtCalculation = $this->imtCalculationRepository->find($id);

        if (empty($imtCalculation)) {
            return $this->sendError('Imt Calculation not found');
        }

        $imtCalculation = $this->imtCalculationRepository->update($input, $id);

        return $this->sendResponse($imtCalculation->toArray(), 'ImtCalculation updated successfully');
    }

    /**
     * Remove the specified ImtCalculation from storage.
     * DELETE /imtCalculations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ImtCalculation $imtCalculation */
        $imtCalculation = $this->imtCalculationRepository->find($id);

        if (empty($imtCalculation)) {
            return $this->sendError('Imt Calculation not found');
        }

        $imtCalculation->delete();

        return $this->sendSuccess('Imt Calculation deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $imtCalculationsCount = $this->imtCalculationRepository->count();
        return $this->sendResponse(['count'=>$imtCalculationsCount,'total_pages'=>ceil($imtCalculationsCount/$limit)], 'Imt Calculations Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->imtCalculationRepository->multiDelete($ids)], 'Selected Imt Calculations Deleted');
    }
    public function export()
    {
        return $this->imtCalculationRepository->export()->download("Imt Calculations-".date("Y-m-d").".xlsx");
    }
}
