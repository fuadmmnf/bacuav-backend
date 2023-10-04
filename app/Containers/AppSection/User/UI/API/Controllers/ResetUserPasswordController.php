<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\ResetUserPasswordAction;
use App\Containers\AppSection\User\UI\API\Requests\ResetUserPasswordRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ResetUserPasswordController extends ApiController
{
    public function __invoke(ResetUserPasswordRequest $request): JsonResponse
    {
        $user = app(ResetUserPasswordAction::class)->run($request);
        return $this->noContent(status: $user? 204: 400);
    }
}
