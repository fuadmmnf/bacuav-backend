<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\FindUserByIdAction;
use App\Containers\AppSection\User\Tasks\FindUserByIdentifierTask;
use App\Containers\AppSection\User\UI\API\Requests\CheckIfUserVerifiedRequest;
use App\Containers\AppSection\User\UI\API\Requests\FindUserByIdRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class CheckIfUserVerifiedController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(CheckIfUserVerifiedRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = app(FindUserByIdentifierTask::class)->run(identifierName: 'mobile', identifier: $request->query('mobile'));
        return $this->noContent(status: $user && $user->verified_at != null? 200: 401);
    }
}
