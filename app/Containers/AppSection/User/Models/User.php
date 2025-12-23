<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authentication\Notifications\VerifyEmail;
use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Contracts\MustVerifyEmail;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rules\Password;

class User extends ParentUserModel implements MustVerifyEmail
{
    use AuthorizationTrait;
    use AuthenticationTrait;

//    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'name',
        'name_bangla',
        'mobile',
        'email',
        'password',
        'designation',
        'commissionerate_id',
        'division_id',
        'circle_id',
        'district_id',
        'address',
        'photo',
        'dob',
        'member_type',
        'joining_date',
        'fee_collection_start',
        'verified_at',
        'blood_group',
        'social_media_link',
        'educational_qualification',
        'last_education_institution',
        'spouse_profession',
        'officer_joining_date'
//        'gender',
//        'birth',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
//        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_verified' => 'bool',
//        'birth' => 'date',
    ];

    public static function getPasswordValidationRules(): Password
    {
//        return Password::min(8)
//            ->letters()
//            ->mixedCase()
//            ->numbers()
//            ->symbols();
        return Password::min(8);
    }

    public function sendEmailVerificationNotificationWithVerificationUrl(string $verificationUrl): void
    {
        $this->notify(new VerifyEmail($verificationUrl));
    }

    //    protected function email(): Attribute
    //    {
    //        return new Attribute(
    //            get: fn (?string $value): ?string => is_null($value) ? null : strtolower($value),
    //        );
    //    }


    public function commissionerate(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function circle(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
