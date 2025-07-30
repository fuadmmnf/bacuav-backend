<?php

namespace App\Containers\AppSection\File\UI\WEB\Controllers;

use App\Containers\AppSection\File\Actions\FindFileByIdAction;
use App\Containers\AppSection\File\Actions\UpdateFileAction;
use App\Containers\AppSection\File\UI\WEB\Requests\EditFileRequest;
use App\Containers\AppSection\File\UI\WEB\Requests\UpdateFileRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateFileController extends WebController
{
    public function edit(EditFileRequest $request)
    {
        $file = app(FindFileByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateFileRequest $request)
    {
        $file = app(UpdateFileAction::class)->run($request);
        // ...
    }
}
