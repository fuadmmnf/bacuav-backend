<?php

namespace App\Containers\AppSection\File\Tests\Unit\Tasks;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tasks\FindFileByIdTask;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindFileByIdTask::class)]
class FindFileByIdTaskTest extends UnitTestCase
{
    public function testFindFileById(): void
    {
        $file = FileFactory::new()->createOne();

        $foundFile = app(FindFileByIdTask::class)->run($file->id);

        $this->assertEquals($file->id, $foundFile->id);
    }
}
