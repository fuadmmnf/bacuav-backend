<?php

namespace App\Containers\AppSection\Category\Data\Seeders;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CreateCategoriesSeeder_7 extends ParentSeeder
{
    public function run() //creating category nesting assuming max 1 depth
    {
        if(is_local()) {
            srand(config('app.seeder-seed'));
            $categoryTypes = config('appSection-category.resource_types', ['category', 'sub-category']);

            foreach (range(0, 5) as $it){
                foreach ($categoryTypes as $categoryType) {
                    $parent = Category::factory()->create(['type' => $categoryType['name']]);

                    foreach (range(0, 5) as $i) { // generate 5 instance of each parent
                        foreach ($categoryType['children'] as $childType) {
                                $child = Category::factory()->create(['type' => $childType['name']]);
                                $child->appendToNode($parent)->save();

                            foreach (range(0, 5) as $j) { // generate 5 instance of each parent
                                foreach ($childType['children'] as $subchildType) {
                                    $subchild = Category::factory()->create(['type' => $subchildType['name']]);
                                    $subchild->appendToNode($child)->save();
                                }
                            }

                    }
                }
            }

        }

    }
}
