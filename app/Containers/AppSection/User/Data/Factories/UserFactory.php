<?php

namespace App\Containers\AppSection\User\Data\Factories;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends ParentFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        static $password;

        return [
            'name' => $this->faker->name(),
            'name_bangla' => $this->faker->name(),
            'mobile' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $password ?: $password = Hash::make('testing-password'),
            'designation' => $this->faker->randomElement(['RO', 'ARO']),
            'address' => $this->faker->randomElement(['rajshahi', 'dhaka', 'chittagong']),
            'photo' => $this->faker->imageUrl(),
            'dob' => $this->faker->dateTimeBetween(startDate: '-50 years', endDate: '-20 yeras'),
            'verified_at' => $this->faker->randomElement([Carbon::now(), null]),
            'joining_date' => $this->faker->dateTimeBetween(startDate: '-15 years', endDate: '-5 years'),
            'fee_collection_start' => $this->faker->dateTimeBetween(startDate: '-10 years', endDate: 'now'),
//            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
//            'gender' => $this->faker->randomElement(['male', 'female', 'unspecified']),
//            'birth' => $this->faker->date(),
        ];
    }

    public function admin(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole(config('appSection-authorization.admin_role'));
        });
    }

    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
