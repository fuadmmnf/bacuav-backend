<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class GetAllUsersRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [

    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [

    ];

    public function boot()
    {
//        $this->access = [
//            'permissions' => [
//                'subadmin' => 'crud-subadmins',
//                'moderator' => 'crud-moderator',
//                'mentor' => 'crud-mentor',
//            ][$this->query('role')],
//            'roles' => '',];
        parent::boot();
    }

    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
//        if (!in_array($this->query('role'), ['subadmin', 'moderator', 'mentor'])) {
//            return false;
//        }
        return $this->check([
            'hasAccess',
        ]);
    }
}
