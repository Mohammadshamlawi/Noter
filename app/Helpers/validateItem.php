<?php

if (!function_exists('validateItem')) {
    function validateItem($item): array
    {
        return match (strtolower($item)) {
            'project', 'projects', 'p' => [App\Models\Project::class, 'project', ['notes'], App\Models\Collection::class],
            'collection', 'collections', 'c' => [App\Models\Collection::class, 'collection', ['projects'], null],
            default => [App\Models\Note::class, 'note', [], App\Models\Project::class]
        };
    }
}
