<?php

namespace Modules\User\Models;

use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;;
/**
 * Class ABPMCalculation
 * @package Modules\User\Models
 * @version March 23, 2023, 11:48 am +0430
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property json $sys
 * @property json $dia
 * @property json $hr
 * @property integer $user_id
 * @property integer $patient_id
 * @property string $created_at
 * @property string $updated_at
 */
class ABPMCalculation extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'abpm_calculations';




    protected $dates = ['created_at', 'updated_at'];



    public $fillable = [
        'sys',
        'dia',
        'hr',
        'weight',
        'height',
        'time',
        'times',
        'user_id',
        'patient_id',
        'created_at',
        'updated_at'
    ];
    public $with = [
        'user',
        'patient'
    ];
    public $appends = [];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'patient_id' => 'integer',
        'sys'=>'array',
        'dia'=>'array',
        'hr'=>'array',
        'times'=>'array'
    ];
    public static $dateFormats = [

        'created_at' => 'Y-m-d H:i',

        'updated_at' => 'Y-m-d H:i'

    ];
    /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/user/api/abpm_calculations';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sys' => 'required',
        'dia' => 'required',
        'hr' => 'required'
    ];


    /**
     * All the images fields for model
     *
     * @var array
     */
    public static $imageFields = [];

    /**
     * All the file fields for model
     *
     * @var array
     */
    public static $fileFields = [];

    /**
     * Flag to disable auto upload
     *
     * @var bool
     */
    public static $disableAutoUpload = true;

    /**
     * Fields
     *
     * @var array
     */
    public static $fields = [
        'sys' => [
            'htmlType' => 'textarea',
            'inIndex' => 1,
            'inForm' => 1,
            'title' => 'Sys',
            'name' => 'sys',

        ],
        'dia' => [
            'htmlType' => 'textarea',
            'inIndex' => 1,
            'inForm' => 1,
            'title' => 'Dia',
            'name' => 'dia',

        ],
        'hr' => [
            'htmlType' => 'textarea',
            'inIndex' => 1,
            'inForm' => 1,
            'title' => 'Hr',
            'name' => 'hr',

        ],
        'created_at' => [
            'htmlType' => 'datetime',
            'inIndex' => 1,
            'inForm' => 0,
            'title' => 'Created At',
            'name' => 'created_at',

        ],
        'updated_at' => [
            'htmlType' => 'datetime',
            'inIndex' => 1,
            'inForm' => 0,
            'title' => 'Updated At',
            'name' => 'updated_at',

        ],
        'user' => [
            'htmlType' => 'relation',
            'relationType' => 'mt1',
            'functionName' => 'user',
            'name' => 'user',
            'title' => 'user',
            'inIndex' => 1,
            'inForm' => 1,
            'foreignKey' => 'user_id',
            'relatedClass' => '\App\Models\User',
        ],
        'patient' => [
            'htmlType' => 'relation',
            'relationType' => 'mt1',
            'functionName' => 'patient',
            'name' => 'patient',
            'title' => 'patient',
            'inIndex' => 1,
            'inForm' => 1,
            'foreignKey' => 'patient_id',
            'relatedClass' => '\Modules\User\Models\Patient',
        ]

    ];

    public static $title = "id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\Modules\User\Models\Patient::class, 'patient_id', 'id');
    }


    public static function allowedFilters()
    {
        return [
            'sys' => 'sys',
            'dia' => 'dia',
            'hr' => 'hr',
            'user_id' => AllowedFilter::exact('user_id'),
            'patient_id' => AllowedFilter::exact('patient_id'),
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        ];
    }
    public static function allowedIncludes()
    {
        return [
            'user',
            'patient'
        ];
    }
    public static function allowedSorts()
    {
        return [
            'sys',
            'dia',
            'hr',
            'user_id',
            'patient_id',
            'created_at',
            'updated_at'
        ];
    }
    public function getSysAvgAttribute()
    {
        $sum=0;
        $count=0;
        foreach($this->sys as $item){
            if($item != ""){
                $sum+=$item;
                $count++;
            }
        }
        return number_format(($sum / $count),1);
    }
    public function getDiaAvgAttribute()
    {
        $sum=0;
        $count=0;
        foreach($this->dia as $item){
            if($item != ""){
                $sum+=$item;
                $count++;
            }
        }
        return number_format(($sum / $count),1);
    }
    
    public function getSysAwakeAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if(($time >= 7.3 && $time <= 23) || ($time >= 0 && $time <= 1.30) ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    public function getSysAsleepAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if($time >= 1.30 && $time <= 7 ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    public function getDiaAwakeAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if(($time >= 7.3 && $time <= 23) || ($time >= 0 && $time <= 1.30) ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    public function getDiaAsleepAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if($time >= 1.30 && $time <= 7 ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    public function getSysDayAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
     public function getSysNightAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[22,23,0,1,2,3,4,5,6];
        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    public function getDiaDayAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    public function getDiaNightAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[22,23,0,1,2,3,4,5,6];
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    
    
        public function getHrNightAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[22,23,0,1,2,3,4,5,6];
        foreach($this->hr as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    
    public function getHrDayAvgAttribute()
    {
        $sum=0;
        $count=0;
        $allowedHours=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
        foreach($this->hr as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(in_array($timeArr[0],$allowedHours) &&  $item != ""){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    public function getHrAwakeAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->hr as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if(($time >= 7.3 && $time <= 23) || ($time >= 0 && $time <= 1.30) ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    public function getHrAsleepAvgAttribute()
    {
        $sum=0;
        $count=0;
        
        foreach($this->hr as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $time=floatval(str_replace(":",".",$time));
            if($time >= 1.30 && $time <= 7 ){
                $sum+=$item;
                $count++;
            }
        }
        $count=$count == 0 ? 1:$count;
        return number_format(($sum / $count),1);
    }
    
    public function getHrAvgAttribute()
    {
        $sum=0;
        $count=0;
        foreach($this->hr as $item){
            if($item != ""){
                $sum+=$item;
                $count++;
            }
        }
        return number_format(($sum / $count),1);
    }
    public function getSysCountAttribute(){
        $count=0;
        foreach($this->sys as $item){
            if(is_numeric($item)) $count++;
        }
        return $count;
    }
    public function getDiaCountAttribute(){
        $count=0;
        foreach($this->dia as $item){
            if(is_numeric($item)) $count++;
        }
        return $count;
    }
public function getDaySummaryAttribute(){
        $sys_above_130_count=0;
        $sys_under_130_count=0;
        $sys_count=0;
        $dia_count=0;
        $dia_above_85_count=0;
        $dia_under_85_count=0;
        $allowedHours=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22];
        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(!in_array($timeArr[0],$allowedHours) ||  $item == ""){
                continue;
            }
            if(is_numeric($item) && $item > 130) $sys_above_130_count++;
            if(is_numeric($item) && $item <= 130) $sys_under_130_count++;
            $sys_count++;
            
        }
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(!in_array($timeArr[0],$allowedHours) ||  $item == ""){
                continue;
            }
            if(is_numeric($item) && $item >= 85) $dia_above_85_count++;
            if(is_numeric($item) && $item < 85) $dia_under_85_count++;
            $dia_count++;
        }
        
        return [
            'sys_above_130_count'=>round(($sys_above_130_count / $sys_count)*100),
            'sys_under_130_count'=>round(($sys_under_130_count / $sys_count)*100),
            'dia_above_85_count'=>round(($dia_above_85_count / $dia_count)*100),
            'dia_under_85_count'=>round(($dia_under_85_count / $dia_count)*100)
        ];
    }

    public function getNightSummaryAttribute(){
        $sys_above_130_count=0;
        $sys_under_130_count=0;
        $sys_count=0;
        $dia_count=0;
        $dia_above_85_count=0;
        $dia_under_85_count=0;

        $allowedHours=[22,23,0,1,2,3,4,5,6];

        foreach($this->sys as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(!in_array($timeArr[0],$allowedHours) ||  $item == ""){
                continue;
            }
            if(is_numeric($item) && $item > 130) $sys_above_130_count++;
            if(is_numeric($item) && $item <= 130) $sys_under_130_count++;
            $sys_count++;
        }
        foreach($this->dia as $key=>$item){
            if(!isset($this->times[$key])) continue;
            $time=$this->times[$key];
            $timeArr=explode(":",$time);
            if(!in_array($timeArr[0],$allowedHours) ||  $item == ""){
                continue;
            }
            if(is_numeric($item) && $item >= 85) $dia_above_85_count++;
            if(is_numeric($item) && $item < 85) $dia_under_85_count++;
            $dia_count++;
        }
        
        return [
            'sys_above_130_count'=>round(($sys_above_130_count / $sys_count)*100),
            'sys_under_130_count'=>round(($sys_under_130_count / $sys_count)*100),
            'dia_above_85_count'=>round(($dia_above_85_count / $dia_count)*100),
            'dia_under_85_count'=>round(($dia_under_85_count / $dia_count)*100)
        ];
    }
    public function getSummaryAttribute(){
        $sys_above_130_count=0;
        $sys_under_130_count=0;

        $dia_above_85_count=0;
        $dia_under_85_count=0;
        foreach($this->sys as $item){
            if(is_numeric($item) && $item > 130) $sys_above_130_count++;
            if(is_numeric($item) && $item <= 130) $sys_under_130_count++;
        }
        foreach($this->dia as $item){
            if(is_numeric($item) && $item >= 85) $dia_above_85_count++;
            if(is_numeric($item) && $item < 85) $dia_under_85_count++;
        }
        $sys_count=$this->sys_count;
        $dia_count=$this->dia_count;
        return [
            'sys_above_130_count'=>round(($sys_above_130_count / $sys_count)*100),
            'sys_under_130_count'=>round(($sys_under_130_count / $sys_count)*100),
            'dia_above_85_count'=>round(($dia_above_85_count / $dia_count)*100),
            'dia_under_85_count'=>round(($dia_under_85_count / $dia_count)*100)
        ];
    }
    public function getAwakeSummaryAttribute(){
    $sys_above_130_count=0;
    $sys_under_130_count=0;
    $sys_count=0;
    $dia_count=0;
    $dia_above_85_count=0;
    $dia_under_85_count=0;
    
    foreach($this->sys as $key=>$item){
        if(!isset($this->times[$key])) continue;
        $time=$this->times[$key];
        $time=floatval(str_replace(":",".",$time));
        if($time >= 1.30 || $time <= 7 ){
            continue;
        }
        if(is_numeric($item) && $item > 130) $sys_above_130_count++;
        if(is_numeric($item) && $item <= 130) $sys_under_130_count++;
        $sys_count++;
        
    }
    foreach($this->dia as $key=>$item){
        if(!isset($this->times[$key])) continue;
        $time=$this->times[$key];
        $time=floatval(str_replace(":",".",$time));
        if($time >= 1.30 || $time <= 7 ){
            continue;
        }
        if(is_numeric($item) && $item >= 85) $dia_above_85_count++;
        if(is_numeric($item) && $item < 85) $dia_under_85_count++;
        $dia_count++;
    }
$dia_count=$dia_count == 0 ? 1:$dia_count;    
$sys_count=$sys_count == 0 ? 1:$sys_count;    
    return [
        'sys_above_130_count'=>round(($sys_above_130_count / $sys_count)*100),
        'sys_under_130_count'=>round(($sys_under_130_count / $sys_count)*100),
        'dia_above_85_count'=>round(($dia_above_85_count / $dia_count)*100),
        'dia_under_85_count'=>round(($dia_under_85_count / $dia_count)*100)
    ];
}

public function getAsleepSummaryAttribute(){
    $sys_above_130_count=0;
    $sys_under_130_count=0;
    $sys_count=0;
    $dia_count=0;
    $dia_above_85_count=0;
    $dia_under_85_count=0;

    

    foreach($this->sys as $key=>$item){
        if(!isset($this->times[$key])) continue;
        $time=$this->times[$key];
        $time=floatval(str_replace(":",".",$time));
        if(($time >= 7.3 && $time <= 23) || ($time >= 0 && $time <= 1.30) ){
            continue;
        }
        if(is_numeric($item) && $item > 130) $sys_above_130_count++;
        if(is_numeric($item) && $item <= 130) $sys_under_130_count++;
        $sys_count++;
    }
    foreach($this->dia as $key=>$item){
        if(!isset($this->times[$key])) continue;
        $time=$this->times[$key];
        $time=floatval(str_replace(":",".",$time));
        if(($time >= 7.3 && $time <= 23) || ($time >= 0 && $time <= 1.30) ){
            continue;
        }
        
        if(is_numeric($item) && $item >= 85) $dia_above_85_count++;
        if(is_numeric($item) && $item < 85) $dia_under_85_count++;
        $dia_count++;
    }
$dia_count=$dia_count == 0 ? 1:$dia_count;    
$sys_count=$sys_count == 0 ? 1:$sys_count;    
    return [
        'sys_above_130_count'=>round(($sys_above_130_count / $sys_count)*100),
        'sys_under_130_count'=>round(($sys_under_130_count / $sys_count)*100),
        'dia_above_85_count'=>round(($dia_above_85_count / $dia_count)*100),
        'dia_under_85_count'=>round(($dia_under_85_count / $dia_count)*100)
    ];
}
    public function getResultMsgAttribute(){
        $message="";
        if ($this->sys[0] <= 135 && $this->sys_avg <= 135) $message= "Normal Blood Pressure";
        if ($this->sys[0] < 135 && $this->sys_avg >= 135) $message= "Masked Hypertension";
        if ($this->sys[0] > 135 && $this->sys_avg <= 135) $message= "White coat hypertension";
        if ($this->sys[0] > 135 && $this->sys_avg >= 135) $message= "Sustained hypertension";
        return $message;
    }
    // public function getDbpAbove85PercentAttribute(){
    //     $count=0;
    //     foreach($this->dia as $item){
    //         if(is_numeric($item) && $item > 130) $count++;
    //     }
    //     return ($count / $this->dia_count)*100;
    // }
}
