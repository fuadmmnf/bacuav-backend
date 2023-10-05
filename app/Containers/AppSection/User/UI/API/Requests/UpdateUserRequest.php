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
            'mobile' => 'required|unique:users,mobile,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => [
                'required',
                User::getPasswordValidationRules(),
            ],
            'name' => 'required|min:2|max:50',
            'name_bangla' => 'required|min:2',
            'designation' => 'required|in:RO,ARO',
            'commissionerate' => 'required',
            'division' => 'required',
            'circle' => 'required',
            'address' => 'present|nullable',
//            'gender' => 'in:male,female,unspecified',
            'photo' => 'present|image|nullable',
            'dob' => 'present|date|nullable',
            'joining_date' => 'present|date|nullable',
            'fee_collection_start' => 'present|date|nullable',
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
