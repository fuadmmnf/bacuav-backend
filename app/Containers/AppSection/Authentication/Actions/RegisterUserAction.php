<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Notifications\Welcome;
use App\Containers\AppSection\Authentication\Tasks\SendVerificationEmailTask;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\Actions\CreateUserAndAssignRolesSubAction;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Storage;

class RegisterUserAction extends ParentAction
{


    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(RegisterUserRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'mobile',
            'email',
            'password',
            'name',
            'name_bangla',
            'designation',
            'commissionerate_id',
            'division_id',
            'circle_id',
            'address',
//            'gender' => 'in:male,female,unspecified',
            'dob',
        ]);

        $user = app(CreateUserAndAssignRolesSubAction::class)->run(request: $sanitizedData, roleNames: ['member']);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_uploaded_path = $image->store("images/members", 'public');
            $uploadedImageResponse = array(
                "image_name" => basename($image_uploaded_path),
                "image_url" => Storage::disk('public')->url($image_uploaded_path),
                "mime" => $image->getClientMimeType()
            );

            $user = app(UpdateUserTask::class)->run(['photo' => $uploadedImageResponse['image_url']], $user->id);
        }
//        $user->notify(new Welcome());
//        $this->sendVerificationEmailTask->run($user, $request->verification_url);

        return $user;
    }
}
