<?php

namespace App\Containers\AppSection\Otp\Data\Factories;

use App\Containers\AppSection\Otp\Models\Otp;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class OtpFactory extends ParentFactory
{
    protected $model = Otp::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
