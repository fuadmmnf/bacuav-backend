<?php

namespace App\Containers\AppSection\File\UI\WEB\Controllers;

use App\Containers\AppSection\File\Actions\ListFilesAction;
use App\Containers\AppSection\File\UI\WEB\Requests\ListFilesRequest;
use App\Ship\Parents\Controllers\WebController;

class ListFilesController extends WebController
{
    public function index(ListFilesRequest $request)
    {
        $files = app(ListFilesAction::class)->run($request);
        // ...
    }
}
