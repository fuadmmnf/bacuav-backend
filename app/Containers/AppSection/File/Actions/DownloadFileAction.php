<?php

namespace App\Containers\AppSection\File\Actions;

use App\Containers\AppSection\File\Tasks\FindFileByIdTask;
use App\Containers\AppSection\File\UI\API\Requests\DownloadFileRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Storage;

class DownloadFileAction extends ParentAction
{
    public function run(DownloadFileRequest $request)
    {
        $file = app(FindFileByIdTask::class)->run($request->id);
        $disk = 'public'; // or wherever you store files
        return Storage::disk($disk)->download($file->path, $file->filename);
    }
}
