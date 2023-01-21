<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateMaceAssesmentAPIRequest;
use Modules\User\Http\Requests\API\UpdateMaceAssesmentAPIRequest;
use Modules\User\Models\MaceAssesment;
use Modules\User\Repositories\MaceAssesmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MaceAssesmentController
 * @package Modules\User\Http\Controllers\API
 */

class MaceAssesmentAPIController extends AppBaseController
{
    /** @var  MaceAssesmentRepository */
    private $maceAssesmentRepository;

    public function __construct(MaceAssesmentRepository $maceAssesmentRepo)
    {
        $this->maceAssesmentRepository = $maceAssesmentRepo;
        $this->middleware('auth:sanctum');

    }

    /**
     * Display a listing of the MaceAssesment.
     * GET|HEAD /maceAssesments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $maceAssesments = $this->maceAssesmentRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        if(!auth()->user()->master){
            $maceAssesments=$maceAssesments->where("user_id",auth()->user()->id);
            $maceAssesmentsCount = MaceAssesment::where("user_id",auth()->user()->id)->count();
        }else{
            $maceAssesmentsCount = MaceAssesment::count();
        }
        $limit=$request->get('limit',10);
        $maceAssesments=$maceAssesments->get();
        return $this->sendResponse(['pagination_data'=>['count'=>$maceAssesmentsCount,'total_pages'=>ceil($maceAssesmentsCount/$limit)],'items'=>$maceAssesments->toArray()], 'Mace Assesments retrieved successfully');
    }

    /**
     * Store a newly created MaceAssesment in storage.
     * POST /maceAssesments
     *
     * @param CreateMaceAssesmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaceAssesmentAPIRequest $request)
    {
        $input = $request->all();

        $maceAssesment = $this->maceAssesmentRepository->create($input);

        return $this->sendResponse($maceAssesment->toArray(), 'Mace Assesment saved successfully');
    }

    /**
     * Display the specified MaceAssesment.
     * GET|HEAD /maceAssesments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MaceAssesment $maceAssesment */
        $maceAssesment = $this->maceAssesmentRepository->find($id);

        if (empty($maceAssesment)) {
            return $this->sendError('Mace Assesment not found');
        }
        ['HbA1C'=>$HbA1C,'LDL_cholesterol'=>$LDL_cholesterol,'HDL_cholesterol'=>$HDL_cholesterol,'Age'=>$Age,'SBP'=>$SBP,'Triglycerides'=>$Triglycerides,'DBP'=>$DBP,'LeftAnklebrachialIndex'=>$LeftAnklebrachialIndex,'RightAnklebrachialIndex'=>$RightAnklebrachialIndex,'Heigth'=>$Heigth,'Weigth'=>$Weigth,'Sex'=>$Sex,'Smoker'=>$Smoker,'TBP'=>$TBP,'MI'=>$MI,'Diabetes'=>$Diabetes,'FH'=>$FH,'THL'=>$THL]=$maceAssesment->toArray();
        $data=$maceAssesment->toArray();
        $Parental_hypertension=isset($data['Parental_hypertension']) ? $data['Parental_hypertension']:"";
        $Total_cholesterol = $LDL_cholesterol + $HDL_cholesterol + ($Triglycerides / 5);

        $ABI = ($LeftAnklebrachialIndex + $RightAnklebrachialIndex)/2;




        $Ken = ($Age * 0.0455) + ($Sex * 0.7496)  + ($Diabetes * 0.5168) + ($Smoker * 0.4732) + ($Total_cholesterol * 0.0053) - ($HDL_cholesterol * 0.0140) + ($THL * 0.2473) + ($SBP * 0.0085) + ($TBP * 0.3381) + ($FH * 0.4522);
        $Kmen = (1 - pow(0.99963, exp($Ken))) * 100;


        $Wen = ($Age * 0.0455) + ($Sex * 0.7496) + ($Diabetes * 0.5168) + (0 * 0.4732) + (130 * 0.0053) - (55 * 0.0140) + ($THL * 0.2473) + (120 * 0.0085) + ($TBP * 0.3381) + ($FH * 0.4522);
        $OMen = (1 - pow(0.99963, exp($Wen))) * 100;
        $B1 = 0.0799 * $Age + 3.137 * log($SBP) + 0.180 * log(0.1) + 1.382 * log($Total_cholesterol);

        $B2 = -1.172 * log($HDL_cholesterol) + 0.134 * $HbA1C + 0.818 * $Smoker + 0.438 * $MI;

        $B = $B1 + $B2;
        $RSK = (1 - pow(0.98634, exp($B-22.325))) * 100;


        // $c1 = 0.0799 * $Age + 3.137 * log(120) + 0.180 * log(0.1) + 1.382 * log(150);

        // $c2 = -1.172 * log(55) + 0.134 * 5 + 0.818 * 0 + 0.438 * $MI;

        // $c = $c1 + $c2;$RSK1 = (1 - pow(0.98634, exp($c - 22.325))) * 100;

        $c1 = 0.0799 * $Age + 3.137 * log(120) + 0.180 * log(0.1) + 1.382 * log(150);

        $c2 = -1.172 * log(40) + 0.134 * 6 + 0.818 * 0 + 0.438 * $MI;

        $c = $c1 + $c2;
        $RSK1 = (1 - pow(0.98634, exp($c - 22.325))) * 100;


        $PWV = ((0.12*$Age)+8)*100;

        $ASI = ($PWV/50)*($DBP/70)*($ABI/0.8); //Arterial Stiffness Index (ASI)



        // $Risk1 = $Kmen + ((0.035*$Weigth)-1.4)+((0.175*$ASI)-7.65);


        // $Risk2 = $RSK + ((0.035*$Weigth)-1.4)+((0.175*$ASI)-7.65);
        $Risk1 = $Kmen;
        $Risk2 = $RSK;

        $msg="";
        if($Risk1 < 5){
            $msg="Low risk";
        }else if($Risk1 < 20 && $Risk1 > 5){
            $msg="Moderate risk";
        }else if($Risk1 > 20){
            $msg="High risk";
        }
        $msg2="";
        if($Risk2 < 5){
            $msg2="Low risk";
        }else if($Risk2 < 20 && $Risk2 > 5){
            $msg2="Moderate risk";
        }else if($Risk2 > 20){
            $msg2="High risk";
        }

        //new


        if((auth()->check() && auth()->user()->panel_type == 3) || (auth()->check() && auth()->user()->panel_type == 4) || (auth()->check() && auth()->user()->panel_type == 5)){

            if(auth()->user()->email == "najafi@vcathlab.com"){
                $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace_najafi.docx"));

                $Ideal_weight = 50 + (0.91*($Heigth - 152.4));

                $Height = $Heigth / 100;

                $BMI = $Weigth / (pow($Heigth,2));
                if ($BMI < 18.5)
                    $Condition = "Underweight";

                if ($BMI >= 18.5 & $BMI < 24.9)
                    $Condition = "Normal weight";

                if ($BMI >= 24.9 & $BMI < 29.9)
                    $Condition = "Overweight";

                if ($BMI >= 29.9)
                    $Condition = "Severe obesity";


                $Body_fat = (1.20*$BMI) + (0.23*$Age) - 16.2;


                if ($Body_fat < 15)
                    $ConditionBF = "Essential fat";

                if ($Body_fat >= 15 & $Body_fat < 20)
                    $ConditionBF = "Athletes";

                if ($Body_fat >= 20 & $Body_fat < 30)
                    $ConditionBF = "Fitness";

                if ($Body_fat >= 30)
                    $ConditionBF = "Obese";


                $msg3="Body Mass Index (BMI) = $BMI, $Condition, (ideal weight = $Ideal_weight (kg))";
                $msg4="Body Fat Percentage (BFP)  = $Body_fat, $ConditionBF, (Ideal Fat = 19 - 29%)";
                $msg5="Physical Activity during a week was ".$data['physical_activity'].".";
                $template->setValue("msg3",$msg3);
                $template->setValue("msg4",$msg4);
                $template->setValue("msg5",$msg5);

                $template->setValue("RISK_FACTORS",implode(",",$data['risk_factors']));
                $template->setValue("HISTORY",implode(",",$data['history']));
                if(isset($data['chief_complaint'])){
                    $template->setValue("CHIEF_COMPLAINT",implode(",",$data['chief_complaint']));
                }

            }else if(auth()->user()->panel_type == 5){
                $RSK=$Risk1;
                if ($RSK <= 5)
                    $ConditionRSK = "Very low risk (SCORE smaller than 5.0)";

                if ($RSK > 5 && $RSK <= 7.5)
                    $ConditionRSK = "Low risk (SCORE smaller than 7.5)";

                if ($RSK > 7.5 && $RSK < 20)
                    $ConditionRSK = "Intermediate risk (SCORE greater than 7.5)";

                if ($RSK >= 20)
                    $ConditionRSK = "High risk (SCORE greater than 20)";



                if ($Sex == 0){
                    if ($RSK <= 1.61)
                        $Vascular_age = 21.927*log($RSK) + 49.429;
                    if ($RSK > 1.61 && $RSK <= 28)
                        $Vascular_age = 57.183*pow($RSK, 0.1472);
                    if ($RSK > 28)
                        $Vascular_age = 94 ;

                }


                if ($Sex == 1){
                    if ($RSK <= 3.25)
                        $Vascular_age = 22.171*log($RSK) + 30.656;
                    if ($RSK > 2.61 && $RSK <= 32)
                        $Vascular_age = 46.815*pow($RSK, 0.2025);
                    if ($RSK > 32)
                        $Vascular_age = 94;
                }

                if($Vascular_age > $Age){
                    $CondVasular="Older than";
                }else if($Vascular_age < $Age){
                    $CondVasular="Younger than";

                }




                $PWV = 1.0796-0.0317*$Vascular_age+0.0015*pow($Vascular_age,2)+0.0325*$SBP;

                $DeltaP = ($SBP - $DBP)*133.3;

                $Beta_stiffness = (2120/$DeltaP)*pow($PWV,2)*log($SBP/$DBP);

                $CAVI = 0.063*$Beta_stiffness + 7.758;


                if ($CAVI < 9)
                    $ConCAVI = "Normal (CAVI smaller than 9)";
                if ($CAVI >= 9)
                    $ConCAVI = "Abnormal (CAVI greater than or equal to 9)";

                $Heigth=$Heigth/100;


                $BMI = $Weigth / (pow($Heigth,2));

                if ($BMI < 18.5)
                    $ConBMI = "Underweight";

                if ($BMI >= 18.5 && $BMI < 24.9)
                    $ConBMI = "Normal weight";

                if ($BMI >= 24.9 && $BMI < 29.9)
                    $ConBMI = "Overweight";

                if ($BMI >= 29.9)
                    $ConBMI = "Severe obesity";

                $Ideal_weight = 50 + (0.91 * (($Heigth * 100) - 152.4));

                $Body_fat = (1.20*$BMI) + (0.23*$Age) - 16.2;



                if ($Body_fat < 15)
                    $ConditionBF = "Essential fat";

                if ($Body_fat >= 15 & $Body_fat < 20)
                    $ConditionBF = "Athletes";

                if ($Body_fat >= 20 & $Body_fat < 30)
                    $ConditionBF = "Fitness";

                if ($Body_fat >= 30)
                    $ConditionBF = "Obese";


                //___________________________________________________________________________


                if ($Sex == 1){
                    $TBW = 2.447 - 0.09156*$Age + 0.1074*($Heigth*100) + 0.3362*$Weigth;

                    $TBWP = $TBW/$Weigth;
                    $TBWP=$TBWP * 100;
                    if ($TBWP < 50)
                        $CondTBWP = "Low";

                    if ($TBWP > 50)
                        $CondTBWP = "Normal";

                }




                if ($Sex == 0){
                    $TBW = -2.097 + 0.1069*($Heigth*100)+0.2466*$Weigth;

                    $TBWP = $TBW/$Weigth;
                    $TBWP=$TBWP * 100;
                    if ($TBWP < 45)
                        $CondTBWP = "Low";
                    if ($TBWP > 45)
                        $CondTBWP = "Normal";
                }




                //_________________________________________________________________________



                if ($Sex == 1){
                    $LBM = -29.5336 + 0.33929*($Heigth*100) + 0.32810*$Weigth;

                    $LBMP = $LBM/$Weigth;
                    $LBMP = $LBMP * 100;

                    if ($LBMP < 65)
                        $CondLBMP = "Low";
                    if ($LBMP >= 65)
                        $CondLBMP = "Normal";
                }



                if ($Sex == 0){
                    $LBM = -43.2933 + 0.41813*($Heigth*100)+0.29569*$Weigth;

                    $LBMP = $LBM/$Weigth;
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

                if ($BMI <= 18.5){
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




                if ($BMI>18.5 && $BMI<=24){
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




                if ($BMI>24 && $BMI<28){
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




                if ($BMI>=28){
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
                if ($TBP == "0")
                    $HTN_point = 0;
                $Total_point = $HTN_point + $BMI_point + $DBP_point + $SBP_point;

                if ($Total_point >= -2 && $Total_point <= 0)
                    $RISK_HTN = ((0.0005*$Total_point) + 0.0023)*100;
                if ($Total_point >= 1 && $Total_point <= 18)
                    $RISK_HTN = (0.0025*exp(0.2653*$Total_point))*100;


                if ($Total_point >= 19 && $Total_point <= 26)
                    $RISK_HTN = (0.0654*($Total_point) - 0.9182)*100;

                if ($RISK_HTN <= 20)
                    $CondRISK_HTN = "normal value";
                if ($RISK_HTN > 20 && $RISK_HTN < 60)
                    $CondRISK_HTN = "Intermediate value";
                if ($RISK_HTN >=60)
                    $CondRISK_HTN = "high value";
                if ($SBP <= 120)
                    $CondSBP = "optimal";
                if ($SBP > 120 && $SBP <= 130)
                    $CondSBP = "Normal";
                if ($SBP >= 130 && $SBP < 140)
                    $CondSBP = "High normal";
                if ($SBP >= 140)
                    $CondSBP = "Hypertension";
                $MMAP=0.3333*((2*$DBP)+$SBP);
                $Difweight = $Weigth - $Ideal_weight;
                $DifRSK=$Risk1 - $OMen;
                $Dif_age = $Vascular_age - $Age;
                if ($Vascular_age > $Age)
                    $Cond_age = "older than";
                if ($Vascular_age < $Age)
                    $Cond_age = "younger than";
                $RISK_FACTORS=implode(" , ",$data['risk_factors']);
                $Height=$Heigth * 100;
                $DBP=round(floatval(number_format($DBP,2)) + 0);
                $SBP=round(floatval(number_format($SBP,2)) + 0);
                $Vascular_age=round(floatval(number_format($Vascular_age,2)) + 0);
                $Ideal_weight=round(floatval(number_format($Ideal_weight,2)) + 0);
                $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace-template4.docx"));
                foreach($template->getVariables() as $item){
                    if(isset($$item)){
                        $template->setValue($item,(is_numeric($$item) && (!in_array($item,["Age","DBP","SBP","Vascular_age","Ideal_weight","Height","Weigth"])) ? number_format($$item,2):$$item));
                    }
                }
            }else{
                $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace_ghasemi.docx"));
            }
            $template->setValue("msg",$msg);
            $template->setValue("msg2",$msg2);
            $template->setValue("Risk1",(floatval(number_format($Risk1,2)) + 0));
            $template->setValue("OMen",(floatval(number_format($OMen,2)) + 0));
            $template->setValue("Risk2",(floatval(number_format($Risk2,2)) + 0));
            $template->setValue("RSK1",(floatval(number_format($RSK1,2)) + 0));
            $template->setValue("DBP",(floatval(number_format($DBP,2)) + 0));
            $template->setValue("SBP",(floatval(number_format($SBP,2)) + 0));
            $template->setValue("ABI",(floatval(number_format($ABI,2)) + 0));
            $template->setValue("ASI",round(floatval(number_format($ASI,2)) + 0));
            $template->setValue("name",$maceAssesment->patient->name);
            $template->setValue("age",$maceAssesment->patient->age);
            $template->setValue("PWV",$PWV);

            $template->setValue("sex",($maceAssesment->patient->sex == 1 ? "Male":"Female"));
            $template->setValue("date",$maceAssesment->created_at->format("Y-m-d"));
            $filename="MACE_".$maceAssesment->id."_".time().".docx";
            if(!file_exists(storage_path("app/public/mace_assesments"))){
                mkdir(storage_path("app/public/mace_assesments"));
            }
            $template->saveAs(storage_path("app/public/mace_assesments/".$filename));
        }else{
            $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/mace.docx"));
            $template->setValue("msg",$msg);
            $template->setValue("msg2",$msg2);
            $template->setValue("Risk1",number_format($Risk1,2));
            $template->setValue("OMen",number_format($OMen,2));
            $template->setValue("Risk2",number_format($Risk2,2));
            $template->setValue("RSK1",number_format($RSK1,2));
            $filename="MACE_".$maceAssesment->id."_".time().".docx";
            if(!file_exists(storage_path("app/public/mace_assesments"))){
                mkdir(storage_path("app/public/mace_assesments"));
            }
            $template->saveAs(storage_path("app/public/mace_assesments/".$filename));
        }

        $data['result']=[
            'msg'=>$msg,
            'msg2'=>$msg2,
            'Risk1'=>$Risk1,
            'OMen'=>$OMen,
            'Risk2'=>$Risk2,
            'RSK1'=>$RSK1,
            'ASI'=>$ASI,
            'PWV'=>$PWV,
            'link'=>"https://docs.google.com/viewerng/viewer?url=".url('/storage/mace_assesments/'.$filename),
            'word_link'=>url('/storage/mace_assesments/'.$filename)
        ];
        return $this->sendResponse($data, 'Mace Assesment retrieved successfully');
    }

    /**
     * Update the specified MaceAssesment in storage.
     * PUT/PATCH /maceAssesments/{id}
     *
     * @param int $id
     * @param UpdateMaceAssesmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaceAssesmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var MaceAssesment $maceAssesment */
        $maceAssesment = $this->maceAssesmentRepository->find($id);

        if (empty($maceAssesment)) {
            return $this->sendError('Mace Assesment not found');
        }

        $maceAssesment = $this->maceAssesmentRepository->update($input, $id);

        return $this->sendResponse($maceAssesment->toArray(), 'MaceAssesment updated successfully');
    }

    /**
     * Remove the specified MaceAssesment from storage.
     * DELETE /maceAssesments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MaceAssesment $maceAssesment */
        $maceAssesment = $this->maceAssesmentRepository->find($id);

        if (empty($maceAssesment)) {
            return $this->sendError('Mace Assesment not found');
        }

        $maceAssesment->delete();

        return $this->sendSuccess('Mace Assesment deleted successfully');
    }
    public function paginationData(Request $request)
    {
        $limit=$request->get('limit',10);
        $maceAssesmentsCount = $this->maceAssesmentRepository->count();
        return $this->sendResponse(['count'=>$maceAssesmentsCount,'total_pages'=>ceil($maceAssesmentsCount/$limit)], 'Mace Assesments Pagination retrieved successfully');
    }
    public function multiDelete(Request $request)
    {
        $ids=$request->get("ids");
        return $this->sendResponse(['count'=>$this->maceAssesmentRepository->multiDelete($ids)], 'Selected Mace Assesments Deleted');
    }
    public function export()
    {
        return $this->maceAssesmentRepository->export()->download("Mace Assesments-".date("Y-m-d").".xlsx");
    }
}
