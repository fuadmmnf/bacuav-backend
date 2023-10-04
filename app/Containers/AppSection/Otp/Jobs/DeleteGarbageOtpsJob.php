<?php

namespace App\Containers\AppSection\Otp\Jobs;

use App\Containers\AppSection\Otp\Data\Repositories\OtpRepository;
use App\Containers\AppSection\Otp\Models\Otp;
use App\Ship\Parents\Jobs\Job as ParentJob;
use Carbon\Carbon;

class DeleteGarbageOtpsJob extends ParentJob
{


    public function handle()
    {
        Otp::where('created_at', '<', Carbon::today()->toDateString())->delete();
    }
}
