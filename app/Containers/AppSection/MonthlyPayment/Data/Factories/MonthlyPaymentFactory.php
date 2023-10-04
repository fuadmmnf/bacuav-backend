<?php

namespace App\Containers\AppSection\MonthlyPayment\Data\Factories;

use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class MonthlyPaymentFactory extends ParentFactory
{
    protected $model = MonthlyPayment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
