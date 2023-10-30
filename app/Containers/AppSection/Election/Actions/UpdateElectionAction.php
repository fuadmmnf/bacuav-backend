<?php

namespace App\Containers\AppSection\Election\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Election\Models\Election;
use App\Containers\AppSection\Election\Tasks\FindElectionByIdTask;
use App\Containers\AppSection\Election\Tasks\UpdateElectionTask;
use App\Containers\AppSection\Election\UI\API\Requests\UpdateElectionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Carbon\Carbon;

class UpdateElectionAction extends ParentAction
{
    /**
     * @param UpdateElectionRequest $request
     * @return Election
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateElectionRequest $request): Election
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'title',
            'status',
            'description',
            'start_time',
            'end_time',
            'parent_id',
        ]);
        $election = app(FindElectionByIdTask::class)->run($request->id);
        if ($election->status != $data['status']) {
            if ($data['status'] == 'ongoing')
                $data['start_time'] = Carbon::now();
            if ($data['status'] == 'finished')
                $data['end_time'] = Carbon::now();
            if ($data['status'] == 'published')
                $data['publish_time'] = Carbon::now();
        }


        return app(UpdateElectionTask::class)->run($data, $request->id);
    }
}
