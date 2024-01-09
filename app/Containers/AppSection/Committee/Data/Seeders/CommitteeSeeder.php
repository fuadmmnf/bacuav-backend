<?php

namespace App\Containers\AppSection\Committee\Data\Seeders;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CommitteeSeeder extends ParentSeeder
{
    public function run()
    {
        Committee::factory()->count(5)->create();
    }
}
