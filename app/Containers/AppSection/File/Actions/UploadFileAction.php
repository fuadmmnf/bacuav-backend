<?php

namespace App\Containers\AppSection\File\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\File\Models\File;
use App\Containers\AppSection\File\Tasks\CreateFileTask;
use App\Containers\AppSection\File\UI\API\Requests\CreateFileRequest;
use App\Containers\AppSection\File\UI\API\Requests\UploadFileRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UploadFileAction extends ParentAction
{
    public function __construct(
        private readonly CreateFileTask $createFileTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(UploadFileRequest $request): File
    {
        $data = $request->validated();
        $file = $request->file('file');

        $path = $file->store('uploads/' . $data['owner_type'], 'public');
        $data['path'] = $path;


        $data['owner_type'] = get_owner_class($data['owner_type']);

        $owner = null;
        if (class_exists($data['owner_type'])) {
            $owner = $data['owner_type']::findOrFail($data['owner_id']);
        }

        try {
            $fileModel = $this->createFileTask->run($data);
            if ($owner) {
                $fileModel->owner()->associate($owner);
                $fileModel->save();
            }
            return $fileModel;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
