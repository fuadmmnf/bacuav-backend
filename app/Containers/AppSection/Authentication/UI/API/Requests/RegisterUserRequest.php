<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends ParentRequest
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

    public function rules(): array
    {
        return [
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
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
//            'photo' => 'present|image|nullable',
            'dob' => 'present|nullable',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
