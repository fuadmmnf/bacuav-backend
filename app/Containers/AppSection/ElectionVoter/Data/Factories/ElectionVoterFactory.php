<?php

namespace App\Containers\AppSection\ElectionVoter\Data\Factories;

use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ElectionVoterFactory extends ParentFactory
{
    protected $model = ElectionVoter::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
