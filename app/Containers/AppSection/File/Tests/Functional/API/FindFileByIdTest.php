<?php

namespace App\Containers\AppSection\File\Tests\Functional\API;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FindFileByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/files/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testFindFile(): void
    {
        $file = FileFactory::new()->createOne();

        $response = $this->injectId($file->id)->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($file->id))
                    ->etc()
        );
    }

    public function testFindNonExistingFile(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    public function testFindFilteredFileResponse(): void
    {
        $file = FileFactory::new()->createOne();

        $response = $this->injectId($file->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $file->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindFileWithRelation(): void
    // {
    //     $file = FileFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($file->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $file->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
