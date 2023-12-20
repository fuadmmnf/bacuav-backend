<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\UpdateUserPasswordAction;
use App\Containers\AppSection\User\Actions\UpdateUserPhotoAction;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateCandidatePhotoRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserPhotoRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;

class UpdateUserPhotoController extends ApiController
{
    public function __invoke(UpdateUserPhotoRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = app(UpdateUserPhotoAction::class)->run($request);

        return $this->noContent(status: $user? 204: 400);
    }
}
