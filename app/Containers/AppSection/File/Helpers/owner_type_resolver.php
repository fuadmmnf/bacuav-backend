<?php

if (!function_exists('get_owner_class')) {

    function get_owner_class($owner_type): ?string
    {
        $types = [
            'category' => \App\Containers\AppSection\Category\Models\Category::class,
            'user' => \App\Containers\AppSection\User\Models\User::class,
            'committeeMember' => \App\Containers\AppSection\CommitteeMember\Models\CommitteeMember::class,
            'electionCandidate' => \App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate::class,
        ];

        return $types[$owner_type] ?? null;

    }
}


if (!function_exists('get_owner_tag')) {

    function get_owner_tag($owner_class): ?string
    {
        $types = [
            'category' => \App\Containers\AppSection\Category\Models\Category::class,
            'user' => \App\Containers\AppSection\User\Models\User::class,
            'committeeMember' => \App\Containers\AppSection\CommitteeMember\Models\CommitteeMember::class,
            'electionCandidate' => \App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate::class,
        ];

        return array_flip($types)[$owner_class] ?? null;

    }
}
