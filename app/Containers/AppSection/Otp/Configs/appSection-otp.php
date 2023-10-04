<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AppSection Section Otp Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'enable_sms' => env('ENABLE_SMS', false),
    'sms_api_key' => env('SMS_API_KEY'),
    'sms_sender_id' => env('SMS_SENDER_ID'),
];
