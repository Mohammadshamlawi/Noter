<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Note;
use App\Models\Project;

class HomeController extends Controller
{

    public function index($item = 'note')
    {
        [$model, $item] = match ($item) {
            'note', 'notes', 'n' => [Note::class, 'note'],
            'project', 'projects', 'p' => [Project::class, 'project'],
            'collection', 'collections', 'c' => [Collection::class, 'collection'],
            default => [Note::class, 'note']
        };

        $items = $model::query()->orderByDesc('created_at')->paginate();
        return view('index', compact('items', 'item'));
    }

    // public function notes()
    // {
    //     $notes = Note::query()->paginate();
    //     return view('notes.index', compact('notes'));
    // }

    // public function projects()
    // {
    //     $projects = Project::with('notes')->paginate();
    //     return response()->json(compact('projects'));
    // }

    // public function collections()
    // {
    //     $collections = Collection::with('projects.notes')->paginate();
    //     return response()->json(compact('collections'));
    // }
}
