<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Models\AobpCalculation;

class AOBPController extends Controller
{
   public function result(Request $request,$id)
   {
        $aobp=AobpCalculation::find($id);
        $maps=[];
        $pps=[];
        $cos=[];
        $cis=[];

        $total=max(count($aobp->sys),count($aobp->hr),count($aobp->dia));

        for($i=0;$i<$total;$i++){
            if($aobp->dia[$i] == null && $aobp->sys[$i] == null){
                $map=null;
                $pp=null;
                $co=null;
                $ci=null;
            }
            else{
                $map=$aobp->dia[$i] + 0.333 * ($aobp->sys[$i] - $aobp->dia[$i]);
                $pp=$aobp->sys[$i] - $aobp->dia[$i];
                $co=$pp * $aobp->hr[$i] / 1000;
                $ci=$co / (sqrt($aobp->height * $aobp->weight / 3600));
                $maps[]=$map;
            
                $pps[]=$pp;
                
                $cos[]=$co;
                
                $cis[]=$ci;
            }
            
        }

        $dia_std=$this->std_deviation($aobp->dia);
        $sys_std=$this->std_deviation($aobp->sys);
        $hr_std=$this->std_deviation($aobp->hr);

        $map_std=$this->std_deviation($maps);
        $pp_std=$this->std_deviation($pps);
        $ci_std=$this->std_deviation($cis);
        $co_std=$this->std_deviation($cos);

        $summary=$aobp->summary;

        return view("user::aobp.result",compact('aobp','maps','cos','cis','pps','summary','dia_std','sys_std','hr_std','map_std','pp_std','ci_std','co_std'));
   }
   public function std_deviation($data)
   {
        $n = count($data);
        $mean = array_sum($data) / $n;
        $distance_sum = 0;
        foreach ($data as $i) {  $distance_sum += ($i - $mean) ** 2;}
        $variance = $distance_sum / $n;
        return number_format(sqrt($variance),1);
   }
}
