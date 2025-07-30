<?php

namespace App\Containers\AppSection\File\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class ListFilesRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        // 'id',
    ];
//    private function parserSearchData($search): array
//    {
//        $searchData = [];
//
//        if (stripos($search, ':')) {
//            $fields = explode(';', $search);
//
//            foreach ($fields as $row) {
//                try {
//                    list($field, $value) = explode(':', $row);
//                    $searchData[$field] = $value;
//                } catch (\Exception $e) {
//                    //Surround offset error
//                }
//            }
//        }
//
//        return $searchData;
//    }
//
//    private function mergeSearchData($dataArr): string
//    {
//        $searchData = "";
//
//        foreach ($dataArr as $key => $value) {
//            $searchData = $searchData . (strlen($searchData) > 0 ? ';' : '') . "$key:$value";
//        }
//
//        return $searchData;
//    }
//
//    protected function prepareForValidation(): void
//    {
//        if (str_contains($this->query('search'), "owner_type")) {
//            $searchData = $this->parserSearchData($this->query('search'));
//            if (array_key_exists('owner_type', $searchData)) {
//                $searchData['owner_type'] = get_owner_class($searchData['owner_type']);
//                $this->query->set('search', $this->mergeSearchData($searchData));
//            }
//        }
//
//
//    }


    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
