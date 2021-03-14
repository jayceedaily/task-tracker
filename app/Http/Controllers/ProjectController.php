<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\EditRequest;
use App\Http\Requests\Project\CreateRequest;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return $request
                ->user()
                ->projects()
                ->latest()
                ->simplePaginate();
    }

    public function create(CreateRequest $request)
    {
        $project = Project::create($request->validated());

        return response($project);
    }

    public function show(Request $request, Project $project)
    {
        if($request->user()->cannot('view', $project))
        {
            abort(403);
        }

        return response($project);
    }

    public function edit(EditRequest $request, Project $project)
    {
        if($request->user()->cannot('update', $project))
        {
            abort(403);
        }

        $project->update($request->validated());

        return response($project);
    }

    public function destroy(Request $request, Project $project)
    {
        if($request->user()->cannot('delete', $project))
        {
            abort(403);
        }

        $project->delete();

        return response([
            'message' => __('project.delete_success')
        ]);
    }
}
