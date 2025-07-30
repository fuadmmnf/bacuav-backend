<?php

namespace App\Containers\AppSection\File\Tests\Unit\Data\Migrations;

use App\Containers\AppSection\File\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FilesMigrationTest extends UnitTestCase
{
    public function testFilesTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'bigint',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        $this->assertDatabaseTable('files', $columns);
    }
}
