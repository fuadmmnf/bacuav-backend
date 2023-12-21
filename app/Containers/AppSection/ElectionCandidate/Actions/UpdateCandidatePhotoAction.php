<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\ElectionCandidate\Tasks\UpdateElectionCandidateTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\UpdateCandidatePhotoRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateCandidatePhotoAction extends ParentAction
{


    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(UpdateCandidatePhotoRequest $request): ?ElectionCandidate
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $extension;

            $image->move(public_path("images/candidates"), $imageName);
            return app(UpdateElectionCandidateTask::class)->run(['photo' => '/images/candidates/' . $imageName], $request->id);
        }
        return null;
    }
}
