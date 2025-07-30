<?php

namespace App\Containers\AppSection\File\Tests\Functional\API;

use App\Containers\AppSection\File\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class CreateFileTest extends ApiTestCase
{
    protected string $endpoint = 'post@v1/files';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    // TODO TEST
    public function testCreateFile(): void
    {
        $data = [
            // 'something' => 'value',
        ];

        $response = $this->makeCall($data);

        $response->assertCreated();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'File')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }

    // TODO TEST
    // public function testCreateFileWithInvalidFields(): void
    // {
    //     $data = [
    //         // add some invalid field data here
    //         // 'something' => 'invalid',
    //     ];
    //
    //     $response = $this->makeCall($data);
    //
    //     $response->assertUnprocessable();
    //     // validate errors and their messages here
    //     // $response->assertJson(
    //     //     fn (AssertableJson $json) =>
    //     //        $json->has('message')
    //     //            ->has('errors')
    //     //            ->where('errors.something.0', 'Some validation error message.')
    //     // );
    // }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotCreateFile(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //
    //     $response = $this->makeCall([]);
    //
    //     $response->assertForbidden();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }
}
