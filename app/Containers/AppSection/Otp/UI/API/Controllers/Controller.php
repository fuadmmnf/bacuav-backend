<?php

namespace App\Containers\AppSection\Otp\UI\API\Controllers;

use App\Containers\AppSection\Otp\Data\Repositories\OtpRepository;
use App\Containers\AppSection\Otp\Tasks\SendSmsTask;
use App\Containers\AppSection\Otp\UI\API\Requests\CreateOtpRequest;
use App\Containers\AppSection\Otp\UI\API\Requests\ValidateOtpRequest;
use App\Containers\AppSection\Otp\UI\API\Transformers\OtpTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function __construct(
        protected OtpRepository $repository
    )
    {
    }

    public function generateOtp(CreateOtpRequest $request): JsonResponse
    {
        $data = $request->sanitizeInput(['identifier']);
        //        $data['code'] = sprintf("%05d", mt_rand(1, 999999));
        $data['code'] = filter_var(config('appSection-otp.enable_sms'), FILTER_VALIDATE_BOOLEAN) ? sprintf("%05d", mt_rand(1, 99999)) : '12345';

        $this->repository->deleteWhere(['identifier' => $data['identifier']]);
        $otp = $this->repository->create($data);

        if (filter_var(config('appSection-otp.enable_sms'), FILTER_VALIDATE_BOOLEAN)) {
            app(SendSmsTask::class)->run(receivers: [$otp->identifier],
                message: "EduAid Verification: Please enter the OTP code {$otp->code} in the appropriate field to confirm your mobile number."
            );
        }

        return $this->created();
    }

    public function verifyOtp(ValidateOtpRequest $request): JsonResponse
    {
        $data = $request->sanitizeInput(['identifier', 'code']);
        //        $data['code'] = sprintf("%05d", mt_rand(1, 999999));
        $r = $this->repository->findWhere(['identifier' => $data['identifier']])->first();

        $isFailing = $r == null || $r->code != $data['code'];
        if (!$isFailing) {
            $this->repository->delete($r->id);
        }
        // send sms notification
        return $this->json(['status' => $isFailing ? 'fail' : 'success'], status: $isFailing ? 400 : 200);
    }
}
