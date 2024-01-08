<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Controllers;

use App\Containers\AppSection\CommitteeMember\Actions\UpdateCommitteeMemberPhotoAction;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\UpdateCommitteeMemberPhotoRequest;
use App\Ship\Parents\Controllers\ApiController;

class UpdateCommitteeMemberPhotoController extends ApiController
{
    public function __invoke(UpdateCommitteeMemberPhotoRequest $request): \Illuminate\Http\JsonResponse
    {
        $member = app(UpdateCommitteeMemberPhotoAction::class)->run($request);

        return $this->noContent(status: $member? 204: 400);
    }
}
