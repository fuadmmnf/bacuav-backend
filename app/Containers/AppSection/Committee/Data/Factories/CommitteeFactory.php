<?php

namespace App\Containers\AppSection\Committee\Data\Factories;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CommitteeFactory extends ParentFactory
{
    protected $model = Committee::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
