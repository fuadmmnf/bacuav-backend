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
            $image_uploaded_path = $image->store("images/candidates", 'public');
            $uploadedImageResponse = array(
                "image_name" => basename($image_uploaded_path),
                "image_url" => Storage::disk('public')->url($image_uploaded_path),
                "mime" => $image->getClientMimeType()
            );
            Log::debug(json_encode($uploadedImageResponse));

            return app(UpdateElectionCandidateTask::class)->run(['photo' => $uploadedImageResponse['image_url']], $request->id);
        }
        return null;
    }
}
