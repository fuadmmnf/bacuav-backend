<?php

namespace App\Containers\AppSection\File\Tests\Unit\Tasks;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tasks\ListFilesTask;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListFilesTask::class)]
class ListFilesTaskTest extends UnitTestCase
{
    public function testListFiles(): void
    {
        FileFactory::new()->count(3)->create();

        $foundFiles = app(ListFilesTask::class)->run();

        $this->assertCount(3, $foundFiles);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundFiles);
    }
}
