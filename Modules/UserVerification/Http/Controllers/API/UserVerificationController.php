<?php

namespace Modules\UserVerification\Http\Controllers\API;

use Modules\UserVerification\Entities\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\UserVerification\Jobs\SendVerificationCode;

class UserVerificationController extends Controller
{
    public function __construct()
    {
        if(config("userverification.db_update.enabled")){
            $this->middleware("auth:sanctum")->only("validate_otp");
        }
    }
    public function generate(Request $request)
    {
        //request type : login,signup
        $requestType=$request->get("request_type","login");
       if($requestType == "login"){
            $data=$request->validate([
                'type'=>'required|in:email,mobile',
                'mobile'=>"bail|required_without:email|required_if:type,mobile|iran_mobile|exists:".config("userverification.db_update.users_table").",mobile",//
                'email'=>"bail|required_without:mobile|required_if:type,email|email",
                // "reason"=>'sometimes|in:reset_password,verification'
            ]);
       }else{
            $data=$request->validate([
                'type'=>'required|in:email,mobile',
                'mobile'=>"bail|required_without:email|required_if:type,mobile|iran_mobile",//
                'email'=>"bail|required_without:mobile|required_if:type,email|email",
                // "reason"=>'sometimes|in:reset_password,verification'
            ]);
       }

        $reason=isset($data['reason']) ? $data['reason']:"verification";
        $otp=UserVerification::generate($data,$data['type'],$reason);

        SendVerificationCode::dispatch($otp['code'],$data[$data['type']],$reason)->onQueue($data['type']);
        return response()->json([
            'ok'=>true,
            'message'=>trans("userverification::auth.otp_sent_message")
        ]);
        // return success_response_without_data(trans("auth.otp_sent"));
    }
    public function validate_otp(Request $request)
    {
        $data=$request->validate([
            'code'=>'required',
            'type'=>'required|in:email,mobile',
            'mobile'=>"sometimes|required_if:type,mobile|iran_mobile",//
            'email'=>"sometimes|required_if:type,email|email",
            // "reason"=>'sometimes|in:reset_password,verification'
        ]);
        $reason=isset($data['reason']) ? $data['reason']:"verification";
        $result=UserVerification::validate($data['code'],$data,$reason,$data['type']);
        if(config("userverification.db_update.enabled")){
            if(auth()->check()){
                DB::table(config("userverification.db_update.table"))->where(config("userverification.db_update.user_id_field"),auth()->user()->id)->update([config("userverification.db_update.verify_field")=>1]);
                if($data['type'] == "mobile"){
                    auth()->user()->update([
                        config("userverification.db_update.mobile_field")=>$data['mobile']
                    ]);
                }
            }
        }
        // $result=UserVerification::validate_otp($data['mobile'],$data['otp']);
        if($result == 1){
            return response()->json([
                'ok'=>true,
                'message'=>trans("userverification::auth.otp_true")
            ]);
        }else if($result == 2){
            return response()->json([
                'ok'=>false,
                'message'=>trans("userverification::auth.otp_max_attempts")
            ]);
        }else if($result == 0){
            return response()->json([
                'ok'=>false,
                'message'=>trans("userverification::auth.otp_not_found")
            ]);
        }
    }
}
