<?php

namespace App\Containers\AppSection\File\Tests\Functional\API;

use App\Containers\AppSection\File\Data\Factories\FileFactory;
use App\Containers\AppSection\File\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class UpdateFileTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/files/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    // TODO TEST
    public function testUpdateExistingFile(): void
    {
        $file = FileFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($file->id)->makeCall($data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'File')
                    ->where('data.id', $file->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingFile(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // public function testUpdateExistingFileWithEmptyValues(): void
    // {
    //     $file = FileFactory::new()->createOne();
    //     $data = [
    //         // add some fillable fields here
    //         // 'first_field' => '',
    //         // 'second_field' => '',
    //     ];
    //
    //     $response = $this->injectId($file->id)->makeCall($data);
    //
    //     $response->assertUnprocessable();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //         $json->has('errors')
    //             // ->where('errors.first_field.0', 'assert validation errors')
    //             // ->where('errors.second_field.0', 'assert validation errors')
    //             ->etc()
    //     );
    // }
}
