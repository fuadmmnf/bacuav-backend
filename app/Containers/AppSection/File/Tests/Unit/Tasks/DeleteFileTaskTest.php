<?php

namespace App\Containers\AppSection\File\Tests\Unit\Tasks;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tasks\DeleteFileTask;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteFileTask::class)]
class DeleteFileTaskTest extends UnitTestCase
{
    public function testDeleteFile(): void
    {
        $file = FileFactory::new()->createOne();

        $result = app(DeleteFileTask::class)->run($file->id);

        $this->assertEquals(1, $result);
    }
}
