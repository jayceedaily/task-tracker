<?php

namespace App\Http\Controllers\ProjectMember;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectMember\CreateRequest;

class CreateController extends Controller
{
    public function handle(CreateRequest $request, Project $project)
    {
        $projectMember = new ProjectMember($request->validated());

        $project->members()->save($projectMember);

        return response($projectMember, 201);
    }
}
