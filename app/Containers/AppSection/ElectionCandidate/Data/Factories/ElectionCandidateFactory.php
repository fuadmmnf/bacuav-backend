<?php

namespace App\Containers\AppSection\ElectionCandidate\Data\Factories;

use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ElectionCandidateFactory extends ParentFactory
{
    protected $model = ElectionCandidate::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
