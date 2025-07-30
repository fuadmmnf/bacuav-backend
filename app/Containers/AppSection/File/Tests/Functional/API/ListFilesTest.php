<?php

namespace App\Containers\AppSection\File\Tests\Functional\API;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ListFilesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/files';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testListFilesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        FileFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertOk();
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListFilesByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     FileFactory::new()->count(2)->create();
    //
    //     $response = $this->makeCall();
    //
    //     $response->assertForbidden();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchFilesByFields(): void
    // {
    //     FileFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $file = FileFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($file->name))->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $file->name)
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchFilesByHashID(): void
    // {
    //     $files = FileFactory::new()->count(3)->create();
    //     $secondFile = $files[1];
    //
    //     $response = $this->endpoint($this->endpoint . '?search=id:' . $secondFile->getHashedKey())->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                  ->where('data.0.id', $secondFile->getHashedKey())
    //                 ->etc()
    //     );
    // }
}
