<?php

namespace App\Containers\AppSection\Category\Data\Factories;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CategoryFactory extends ParentFactory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $categories = collect(config('appSection-category.resource_types', ['category', 'sub-category']))->flatten()->all();
        return [
            // Add your model fields here
            'name' => $this->faker->name,
            'type' => $categories[array_rand($categories)],
            'parent_id' => null,
            '_rgt' => null,
            '_lft' => null,
        ];
    }
}
