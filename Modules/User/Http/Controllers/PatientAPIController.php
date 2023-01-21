<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreatePatientAPIRequest;
use Modules\User\Http\Requests\API\UpdatePatientAPIRequest;
use Modules\User\Models\Patient;
use Modules\User\Repositories\PatientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PatientController
 * @package Modules\User\Http\Controllers\API
 */

class PatientAPIController extends AppBaseController
{
    /** @var  PatientRepository */
    private $patientRepository;

    public function __construct(PatientRepository $patientRepo)
    {
        $this->patientRepository = $patientRepo;
        $this->middleware('auth:sanctum')->except(['export']);
    }

    /**
     * Display a listing of the Patient.
     * GET|HEAD /patients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $patients = $this->patientRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $limit=$request->get('limit',10);
        if(auth()->user()->master){
            $patients=$patients->where("user_id",auth()->user()->id);
            $patientsCount = $this->patientRepository->allQuery()->count();
        }else{
            $patients=$patients->where("user_id",auth()->user()->id);
            $patientsCount = $this->patientRepository->allQuery()->where("user_id",auth()->user()->id)->count();
        }
        $patients=$patients->get();
        return $this->sendResponse(['pagination_data'=>['count'=>$patientsCount,'total_pages'=>ceil($patientsCount/$limit)],'items'=>$patients->toArray()], 'Patients retrieved successfully');
    }

    /**
     * Store a newly created Patient in storage.
     * POST /patients
     *
     * @param CreatePatientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePatientAPIRequest $request)
    {
        $input = $request->all();
        $data=[
            // 'physician'=>$input['physician'],
            'name'=>$input['name'],
            'age'=>$input['age'],
            'sex'=>$input['sex'],
            'phone'=>$input['phone'],
            'hospital'=>$input['hospital'],
        ];
        $data['user_id']=auth()->user()->id;
        $patient=Patient::firstOrCreate($data);

        return $this->sendResponse($patient->toArray(), 'Patient saved successfully');
    }

    /**
     * Display the specified Patient.
     * GET|HEAD /patients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Patient $patient */
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            return $this->sendError('Patient not found');
        }

        return $this->sendResponse($patient->toArray(), 'Patient retrieved successfully');
    }

    /**
     * Update the specified Patient in storage.
     * PUT/PATCH /patients/{id}
     *
     * @param int $id
     * @param UpdatePatientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePatientAPIRequest $request)
    {
        $input = $request->all();

        /** @var Patient $patient */
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            return $this->sendError('Patient not found');
        }

        $patient = $this->patientRepository->update($input, $id);

        return $this->sendResponse($patient->toArray(), 'Patient updated successfully');
    }

    /**
     * Remove the specified Patient from storage.
     * DELETE /patients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Patient $patient */
        $patient = $this->patientRepository->find($id);

        if (empty($patient)) {
            return $this->sendError('Patient not found');
        }

        $patient->delete();

        return $this->sendSuccess('Patient deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $patientsCount = $this->patientRepository->count();
        return $this->sendResponse(['count'=>$patientsCount,'total_pages'=>ceil($patientsCount/$limit)], 'Patients Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->patientRepository->multiDelete($ids)], 'Selected Patients Deleted');
    }
    public function export()
    {
        return $this->patientRepository->export()->download("Patients-".date("Y-m-d").".xlsx");
    }
}
