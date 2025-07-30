<?php

namespace App\Containers\AppSection\File\Tests\Functional\API;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tests\Functional\ApiTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class DeleteFileTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/files/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testDeleteExistingFile(): void
    {
        $file = FileFactory::new()->createOne();

        $response = $this->injectId($file->id)->makeCall();

        $response->assertNoContent();
    }

    public function testDeleteNonExistingFile(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteFile(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $file = FileFactory::new()->createOne();
    //
    //     $response = $this->injectId($file->id)->makeCall();
    //
    //     $response->assertForbidden();
    // }
}
