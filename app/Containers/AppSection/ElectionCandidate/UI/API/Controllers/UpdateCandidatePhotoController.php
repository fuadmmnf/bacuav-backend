<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Controllers;

use App\Containers\AppSection\ElectionCandidate\Actions\UpdateCommitteeMemberPhotoAction;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\UpdateCandidatePhotoRequest;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCandidatePhotoController extends ApiController
{
    public function __invoke(UpdateCandidatePhotoRequest $request): \Illuminate\Http\JsonResponse
    {
        $candidate = app(UpdateCommitteeMemberPhotoAction::class)->run($request);

        return $this->noContent(status: $candidate? 204: 400);
    }
}
