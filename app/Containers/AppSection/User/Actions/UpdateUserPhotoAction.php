<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Notifications\PasswordUpdatedNotification;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserPhotoRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateUserPhotoAction extends ParentAction
{


    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateUserPhotoRequest $request): ?User
    {
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $extension;
            Log::debug($imageName);

            $image->move(public_path("images/members"), $imageName);
            return app(UpdateUserTask::class)->run(['photo' => 'images/members/' . $imageName], $request->id);
        }
        return null;
    }
}
