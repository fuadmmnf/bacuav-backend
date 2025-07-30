<?php

namespace App\Containers\AppSection\File\Data\Factories;

use App\Containers\AppSection\File\Models\File;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of File
 *
 * @extends ParentFactory<TModel>
 */
class FileFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = File::class;

    public function definition(): array
    {
        return [];
    }
}
