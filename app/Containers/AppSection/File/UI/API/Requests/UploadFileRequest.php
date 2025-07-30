<?php

namespace App\Containers\AppSection\File\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UploadFileRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
        'owner_id',
    ];

    protected array $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
            'title' => 'present|nullable|string',
            'file' => 'required|file|max:20240',
            'filename' => 'sometimes|nullable|string',
            'mime_type' => 'sometimes|nullable|string',
            'owner_id' => 'required|integer',
            'owner_type' => 'required|string',
            'additional_info' => 'sometimes|nullable',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
