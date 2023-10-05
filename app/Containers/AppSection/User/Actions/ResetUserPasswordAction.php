<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Notifications\PasswordUpdatedNotification;
use App\Containers\AppSection\User\Tasks\FindUserByIdentifierTask;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\ResetUserPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserPasswordRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class ResetUserPasswordAction extends ParentAction
{

    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(ResetUserPasswordRequest $request): ?User
    {
        $codeVerificationReq = Request::create(config('app.api_url') . '/v1/otps/verify', 'POST', $request->sanitizeInput(['identifier', 'code']));

//        Log::debug($codeVerificationReq->getBasePath());
        $codeVerificationResponse = Route::dispatch($codeVerificationReq);

        if ($codeVerificationResponse->getStatusCode() == 200) {
            $oldUser = app(FindUserByIdentifierTask::class)->run(identifierName: 'mobile', identifier: $request->get('identifier'));
            $user = app(UpdateUserTask::class)->run(['password' => $request->get('password')], $oldUser->id);
            $user->tokens()->delete();
            return $user;
        }

        return null;
    }
}
