<?php

namespace App\Containers\AppSection\CommitteeMember\Data\Factories;

use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CommitteeMemberFactory extends ParentFactory
{
    protected $model = CommitteeMember::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            'committee_id' => null,
            'name' => $this->faker->name(),
            'designation' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
