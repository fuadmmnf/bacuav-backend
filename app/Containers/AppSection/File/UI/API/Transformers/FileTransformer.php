<?php

namespace App\Containers\AppSection\File\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\File\Models\File;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FileTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(File $file): array
    {
        return [
            'object' => $file->getResourceKey(),
            'id' => $file->getHashedKey(),
            'title' => $file->title,
            'path' => $file->path,
            'filename' => $file->filename,
            'mime_type' => $file->mime_type,
            'owner_id' => $this->encode($file->owner_id),
            'owner_type' => get_owner_tag($file->owner_type),
            'additional_info' => $file->additional_info,
            'created_at' => $file->created_at,
            'updated_at' => $file->updated_at,
        ];

    }
}
