<?php

namespace App\Containers\AppSection\Election\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateElectionRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => 'admin',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // 'id' => 'required'
            'title' => 'sometimes',
            'description' => 'sometimes',
            'status' => 'sometimes',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date',
            'parent_id' => 'sometimes|nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
