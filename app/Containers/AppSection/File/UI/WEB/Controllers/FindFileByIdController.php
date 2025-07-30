<?php

namespace App\Containers\AppSection\File\UI\WEB\Controllers;

use App\Containers\AppSection\File\Actions\FindFileByIdAction;
use App\Containers\AppSection\File\UI\WEB\Requests\FindFileByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindFileByIdController extends WebController
{
    public function show(FindFileByIdRequest $request)
    {
        $file = app(FindFileByIdAction::class)->run($request);
        // ...
    }
}
