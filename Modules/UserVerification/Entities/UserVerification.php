<?php

namespace Modules\UserVerification\Entities;

use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Modules\Alaadin\Traits\SetInitialValues;
use Illuminate\Support\Facades\DB;

class UserVerification extends Model
{
    protected $fillable=[
        "user_id",
        "ip",
        "user_agent",
        "mobile",
        "email",
        "code",
        "attempts",
        'status',
        'reason'
    ];
    //protected $casts=[];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [];

    //protected $appends = [];
    public static function generate($data,$type,$reason="verification")
    {
        $check_otp=UserVerification::where($type,$data[$type])->where("reason",$reason)->where("created_at",">=",Carbon::now()->subMinutes(10))->first();
        if($check_otp){
            return $check_otp;
        }else{
            UserVerification::where($type,$data[$type])->where("created_at","<",Carbon::now()->subMinutes(10))->delete();
            $otp = rand(111111,999999);
            if(isset($data['type'])){
                unset($data['type']);
            }
            $user=DB::table(config("userverification.user_table"))->where("id",auth()->id())->first();
            if($user){
                $data['user_id']=$user->id;
            }
            $data['ip']=request()->getClientIp();
            $data['user_agent']=request()->header('User-Agent');
            $data['code']=$otp;
            $data['reason']=$reason;
            $data['status']="PENDING";
            $otp=UserVerification::create($data);
        }
        return $otp;
        // while($this->exists()){
        //     $otp = rand(100000, 999999);
        // }

    }
    public static function generateForUser($user,$reason="verification")
    {
        $check_otp=UserVerification::where("user_id",$user->getKey())->where("reason",$reason)->where("created_at",">=",Carbon::now()->subMinutes(10))->first();
        if($check_otp){
            return $check_otp;
        }else{
            UserVerification::where("user_id",$user->getKey())->where("created_at","<",Carbon::now()->subMinutes(10))->delete();
            $otp = rand(111111,999999);
            $data['ip']=request()->getClientIp();
            $data['user_agent']=request()->header('User-Agent');
            $data['code']=$otp;
            $data['user_id']=$user->getKey();
            $data['reason']=$reason;
            $data['status']="PENDING";
            $otp=UserVerification::create($data);
        }
        return $otp;
    }
    public static function validate($otp,$data,$reason="verification",$login_type="mobile"){
        $check_otp = self::where($login_type,$data[$login_type])
            ->where("reason",$reason)
            ->where(function($query){
                $query->where('created_at','>=',Carbon::now()->addMinutes('-'.config("userverification.validation_minutes")));
                $query->whereStatus("PENDING");
                // $query->where('attemtps','<=',config("userverification.max_attempts"));
            })->orderby("created_at","desc")->orderby("updated_at","desc")->first();
        if($check_otp){
            $check_otp->increment("attempts");
            if($check_otp->attempts >= config("userverification.max_attempts")){
                $check_otp->delete();
                return 2; // max attempts exceeded so cannot let user login
            }
            else if($check_otp->code == $otp && $check_otp->attempts < config("userverification.max_attempts")){
                $check_otp->delete();
                return 1; // if attempts is lesser that max attempts so its good
            }
            return 0;//none of the conditions is true then we cannot let user login
        }

        return 0;//otp not found so we cannot let user login
    }
    public static function validateForUser($otp,$user,$reason="verification"){

        $check_otp = self::where("user_id",$user->getKey())
            ->where("reason",$reason)
            ->where(function($query){
                $query->where('created_at','>=',Carbon::now()->addMinutes('-'.config("userverification.validation_minutes")));
                $query->whereStatus("PENDING");
                // $query->where('attemtps','<=',config("userverification.max_attempts"));
            })->orderby("created_at","desc")->orderby("updated_at","desc")->first();
        if($check_otp){
            $check_otp->increment("attempts");
            if($check_otp->attempts >= config("userverification.max_attempts")){
                $check_otp->delete();
                return 2; // max attempts exceeded so cannot let user login
            }
            else if($check_otp->code == $otp && $check_otp->attempts < config("userverification.max_attempts")){
                $check_otp->delete();
                return 1; // if attempts is lesser that max attempts so its good
            }
            return 0;//none of the conditions is true then we cannot let user login
        }

        return 0;//otp not found so we cannot let user login
    }
}
