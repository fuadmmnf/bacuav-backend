<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateUserAction extends ParentAction
{
    public function __construct(
        private readonly UpdateUserTask $updateUserTask
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(UpdateUserRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'mobile',
            'email',
//            'password',
            'name',
            'name_bangla',
            'designation',
            'commissionerate',
            'division',
            'circle',
            'address',
//            'gender' => 'in:male,female,unspecified',
            'dob',
            'joining_date',
            'fee_collection_start',
            'verified_at'
        ]);

        return $this->updateUserTask->run($sanitizedData, $request->id);
    }
}
