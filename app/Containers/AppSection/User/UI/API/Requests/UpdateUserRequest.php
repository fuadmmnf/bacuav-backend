<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Containers\AppSection\Authorization\Traits\IsResourceOwnerTrait;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateUserRequest extends ParentRequest
{
    use IsResourceOwnerTrait;

    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-users',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'mobile' => 'sometimes|unique:users,mobile',
            'email' => 'sometimes|email|unique:users,email',
            'password' => [
                'sometimes',
                User::getPasswordValidationRules(),
            ],
            'name' => 'sometimes|min:2|max:50',
            'name_bangla' => 'sometimes|min:2',
            'designation' => 'sometimes|in:RO,ARO',
            'commissionerate' => 'sometimes',
            'division' => 'sometimes',
            'circle' => 'sometimes',
            'address' => 'sometimes|nullable',
//            'gender' => 'in:male,female,unspecified',
//            'photo' => 'sometimes|image|nullable',
            'dob' => 'sometimes|date|nullable',
            'joining_date' => 'sometimes|date|nullable',
            'fee_collection_start' => 'sometimes|date|nullable',
            'is_verified' => 'sometimes|bool',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess|isResourceOwner',
        ]);
    }
}
