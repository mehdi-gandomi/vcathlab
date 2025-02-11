<?php

namespace Modules\User\Http\Controllers\API;

use Modules\User\Http\Requests\API\CreateAobpCalculationAPIRequest;
use Modules\User\Http\Requests\API\UpdateAobpCalculationAPIRequest;
use Modules\User\Models\AobpCalculation;
use Modules\User\Models\Patient;
use Modules\User\Repositories\AobpCalculationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AobpCalculationController
 * @package Modules\User\Http\Controllers\API
 */

class DominantReportController extends AppBaseController
{
    public function report(Request $request){
        $data=$request->all();
        ['symptoms'=>$symptoms,'lvef'=>$lvef,'crcL'=>$crcL,'age'=>$age,'name'=>$name,'physician'=>$physician,'gender'=>$gender]=$data;

        // $patient = Patient::find($maceAssesment->patient_id);
        $pvd=$request->pvd == 1 ? "yes":($request->pvd == 0 ? "no":"-");
        $copd=$request->copd == 1 ? "yes":($request->copd == 0 ? "no":"-");
        $risk_factors=[];
        if($request->hypertension == 1){
            $risk_factors[]="Hypertension";
        }
        if($request->hyperlipidemia == 1){
            $risk_factors[]="Hyperlipidemia";
        }
        if($request->family_history == 1){
            $risk_factors[]="Family History";
        }
        if($request->mi_history == 1){
            $risk_factors[]="Mi History";
        }
        if($request->diabetic == 1){
            $risk_factors[]="Diabetic";
        }
        if($request->smoker == 1){
            $risk_factors[]="Smoker";
        }
        $risk_factors=implode(", ",$risk_factors);
        $dominant=$request->dominant == "right" ? "Right Dominant":"Left Dominant";

        $morphology=[];

        if($request->bifurcation == 1){
            $morphology[]="Bifurcation: yes";
        }else if($request->bifurcation == 0){
            $morphology[]="Bifurcation: no";
        }

        if($request->trifurcation == 1){
            $morphology[]="Trifurcation: yes";
        }else if($request->trifurcation == 0){
            $morphology[]="Trifurcation: no";
        }

        if($request->aortoOstialLesion == 1){
            $morphology[]="Aortic ostial lesion: yes";
        }else if($request->aortoOstialLesion == 0){
            $morphology[]="Aortic ostial lesion: no";
        }

        if($request->severeTortuosity == 1){
            $morphology[]="Severe Tortuosity: yes";
        }else if($request->severeTortuosity == 0){
            $morphology[]="Severe Tortuosity: no";
        }

        if($request->severeCalcification == 1){
            $morphology[]="Severe Calcification: yes";
        }else if($request->severeCalcification == 0){
            $morphology[]="Severe Calcification: no";
        }

        if($request->longLesion == 1){
            $morphology[]="Long Lesion: yes";
        }else if($request->longLesion == 0){
            $morphology[]="Long Lesion: no";
        }

        if($request->thrombus == 1){
            $morphology[]="Thrombus: yes";
        }else if($request->thrombus == 0){
            $morphology[]="Thrombus: no";
        }

        $morphology=implode(", ",$morphology);

        $template=new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/dominant-report.docx"));
        foreach($template->getVariables() as $item){
            if(isset($$item)){
                $template->setValue($item,(is_numeric($$item) ? number_format($$item,2):$$item));
            }
        }
        $template->setValue("gender",($gender == 1 ? "Male":"Female"));
        $template->setValue("name",$name);
        $template->setValue("age",$age);
    }
}
