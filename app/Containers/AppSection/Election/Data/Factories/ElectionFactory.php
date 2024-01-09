<?php

namespace App\Containers\AppSection\Election\Data\Factories;

use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use DateInterval;

class ElectionFactory extends ParentFactory
{
    protected $model = Election::class;

    public function definition(): array
    {
        $start =  $this->faker->dateTime();
        return [
            // Add your model fields here
            'title' => $this->faker->words(),
            'description' => $this->faker->paragraph(),
            'status' => 'ongoing',
            'start_time' => $start,
            'end_time' => $start->add(DateInterval::createFromDateString('1 day')),
            'publish_time' => $this->faker->randomElement([null, $start->add(DateInterval::createFromDateString('2 day'))]),
            'parent_id' => null,
        ];
    }
}
