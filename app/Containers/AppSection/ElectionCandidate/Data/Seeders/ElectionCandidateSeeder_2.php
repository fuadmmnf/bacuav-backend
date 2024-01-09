<?php

namespace App\Containers\AppSection\ElectionCandidate\Data\Seeders;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\Election\Models\Election;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ElectionCandidateSeeder_2 extends ParentSeeder
{
    public function run()
    {
        foreach (Election::all() as $election) {
            foreach ($election->children as $position){

            ElectionCandidate::factory()->count(rand(3, 6))->create(['election_id' => $position->id]);
            }
        }
    }
}
