<?php
namespace Modules\UserVerification\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Modules\UserVerification\Entities\UserVerification;
use phplusir\smsir\Smsir;

class SMS{
    public function send ($notifiable, Notification $notification) {
        // if (method_exists($notifiable, 'routeNotificationForLog')) {
        //     $id = $notifiable->routeNotificationForLog($notifiable);
        // } else {
        //     $id = $notifiable->getKey();
        // }

        $data = method_exists($notification, 'toSMS')
            ? $notification->toSMS($notifiable)
            : $notification->toArray($notifiable);
        if (empty($data)) {
            return;
        }
        $mobile=method_exists($notifiable, 'getMobile') ? $notifiable->getMobile():$notifiable->mobile;
        if($data['message_type'] == "verification"){
            if(!isset($data['type'])) $data['type']='mobile';
            $reason=isset($data['reason']) ? $data['reason']:"verification";

            if(!isset($data['code'])) {
                $otp=UserVerification::generate($data,$mobile,$reason);
                $data['code']=$otp->code;
            }
            Smsir::sendVerification($data['code'], $mobile);
        }else if($data['message_type'] == "custom_message"){
            Smsir::send([$data['message']],[$mobile]);
        }
        return true;
    }
}
