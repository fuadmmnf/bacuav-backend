<?php

namespace App\Containers\AppSection\Election\Data\Seeders;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ElectionSeeder_1 extends ParentSeeder
{
    public function run()
    {
        foreach (['draft', 'ongoing', 'finished', 'published', 'archived'] as $status) {
            Election::factory()->create(['status' => $status]);
        }

        foreach (Election::all() as $election){
            Election::factory()->count(rand(3,6))->create(['parent_id' => $election->id]);
        }
    }
}
