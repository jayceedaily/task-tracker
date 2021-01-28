<?php

namespace App\Http\Controllers\Task;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function handle(Request $request, Project $project)
    {
        if($request->user()->cannot('view', $project))
        {
            abort(403);
        }

        return response($project->tasks()->simplePaginate());
    }
}
