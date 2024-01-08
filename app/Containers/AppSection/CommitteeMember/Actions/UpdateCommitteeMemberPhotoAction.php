<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\CommitteeMember\Tasks\UpdateCommitteeMemberTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\UpdateCommitteeMemberPhotoRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Str;

class UpdateCommitteeMemberPhotoAction extends ParentAction
{


    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateCommitteeMemberPhotoRequest $request): ?CommitteeMember
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $extension;

            $image->move(public_path("images/committee"), $imageName);
            return app(UpdateCommitteeMemberTask::class)->run(['photo' => '/images/committee/' . $imageName], $request->id);
        }
        return null;
    }
}
