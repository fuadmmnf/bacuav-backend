<?php

namespace App\Containers\AppSection\Otp\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;

class SendSmsTask extends ParentTask
{
    public function __construct()
    {
        // ..
    }

    public function run(array $receivers, string $message)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = config('appSection-otp.sms_api_key');
        $senderid = config('appSection-otp.sms_sender_id');


        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => implode(",", $receivers),
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
