<?php

namespace App\Containers\AppSection\File\UI\WEB\Controllers;

use App\Containers\AppSection\File\Actions\DeleteFileAction;
use App\Containers\AppSection\File\UI\WEB\Requests\DeleteFileRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteFileController extends WebController
{
    public function destroy(DeleteFileRequest $request)
    {
        $result = app(DeleteFileAction::class)->run($request);
        // ...
    }
}
