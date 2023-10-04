<?php

namespace App\Containers\AppSection\Election\Data\Factories;

use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ElectionFactory extends ParentFactory
{
    protected $model = Election::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
