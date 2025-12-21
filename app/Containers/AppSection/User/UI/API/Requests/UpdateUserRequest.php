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
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'commissionerate_id',
        'division_id',
        'circle_id',
        'district_id',
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
            'member_id' => 'sometimes|unique:users,member_id,' . $this->id,
            'mobile' => 'sometimes|unique:users,mobile,' . $this->id,
            'email' => 'sometimes|email|unique:users,email,'. $this->id,
            'password' => [
                'sometimes',
                User::getPasswordValidationRules(),
            ],
            'name' => 'sometimes|min:2|max:50',
            'name_bangla' => 'sometimes|min:2',
            'designation' => 'sometimes|in:RO,ARO',
            'commissionerate_id' => 'sometimes',
            'division_id' => 'sometimes',
            'circle_id' => 'sometimes',
            'district_id' => 'sometimes',
            'address' => 'sometimes|nullable',
//            'gender' => 'in:male,female,unspecified',
//            'photo' => 'sometimes|image|nullable',
            'dob' => 'sometimes|date|nullable',
            'joining_date' => 'sometimes|date|nullable',
            'fee_collection_start' => 'sometimes|date|nullable',
            'verified_at' => 'sometimes|date',
            'blood_group' => 'sometimes',
            'social_media_id' => 'sometimes',
            'educational_qualification' => 'sometimes',
            'last_education_institution' => 'sometimes',
            'spouse_profession' => 'sometimes',
            'officer_joining_date' => 'sometimes|date',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess|isResourceOwner',
        ]);
    }
}
