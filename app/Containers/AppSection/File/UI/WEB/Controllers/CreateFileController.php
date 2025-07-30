<?php

namespace App\Containers\AppSection\File\UI\WEB\Controllers;

use App\Containers\AppSection\File\Actions\CreateFileAction;
use App\Containers\AppSection\File\UI\WEB\Requests\CreateFileRequest;
use App\Containers\AppSection\File\UI\WEB\Requests\StoreFileRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateFileController extends WebController
{
    public function create(CreateFileRequest $request)
    {
    }

    public function store(StoreFileRequest $request)
    {
        $file = app(CreateFileAction::class)->run($request);
        // ...
    }
}
