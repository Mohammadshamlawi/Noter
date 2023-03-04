<?php

if (!function_exists('validateItem')) {
	function validateItem($item)
	{
		return match (strtolower($item)) {
			'note', 'notes', 'n' => [App\Models\Note::class, 'note', []],
			'project', 'projects', 'p' => [App\Models\Project::class, 'project', ['notes']],
			'collection', 'collections', 'c' => [App\Models\Collection::class, 'collection', ['projects']],
			default => [App\Models\Note::class, 'note', []]
		};
	}
}
