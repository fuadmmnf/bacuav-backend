<?php

namespace App\Containers\AppSection\File\Tests\Unit\Factories;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Models\File;
use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FileFactory::class)]
class FileFactoryTest extends UnitTestCase
{
    public function testCreateFile(): void
    {
        $file = FileFactory::new()->make();

        $this->assertInstanceOf(File::class, $file);
    }
}
