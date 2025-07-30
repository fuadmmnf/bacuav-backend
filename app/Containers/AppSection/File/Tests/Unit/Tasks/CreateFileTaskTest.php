<?php

namespace App\Containers\AppSection\File\Tests\Unit\Tasks;

use App\Containers\AppSection\File\Tasks\CreateFileTask;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateFileTask::class)]
class CreateFileTaskTest extends UnitTestCase
{
    public function testCreateFile(): void
    {
        $data = [];

        $file = app(CreateFileTask::class)->run($data);

        $this->assertModelExists($file);
    }
}
