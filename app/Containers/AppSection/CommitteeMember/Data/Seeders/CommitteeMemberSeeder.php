<?php

namespace App\Containers\AppSection\CommitteeMember\Data\Seeders;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CommitteeMemberSeeder extends ParentSeeder
{
    public function run()
    {
        foreach (Committee::all() as $committee) {
            CommitteeMember::factory()->count(rand(5, 10))->create(['committee_id' => $committee->id]);
        }
    }
}
