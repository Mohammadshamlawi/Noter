<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Note;
use App\Models\Project;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function notes()
    {
        $notes = Note::query()->paginate();
        return response()->json(compact('notes'));
    }

    public function projects()
    {
        $projects = Project::with('notes')->paginate();
        return response()->json(compact('projects'));
    }

    public function collections()
    {
        $collections = Collection::with('projects.notes')->paginate();
        return response()->json(compact('collections'));
    }
}
