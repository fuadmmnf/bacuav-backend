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
            // 'name' => $this->faker->name(),
        ];
    }
}
