<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Data\Factories;

use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class ElectionCandidateVoteFactory extends ParentFactory
{
    protected $model = ElectionCandidateVote::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
