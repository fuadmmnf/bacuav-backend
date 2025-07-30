<?php

namespace App\Containers\AppSection\File\Tests\Unit\Tasks;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tasks\UpdateFileTask;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateFileTask::class)]
class UpdateFileTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateFile(): void
    {
        $file = FileFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $updatedFile = app(UpdateFileTask::class)->run($data, $file->id);

        $this->assertEquals($file->id, $updatedFile->id);
        // $this->assertEquals($data['some_field'], $updatedFile->some_field);
    }
}
