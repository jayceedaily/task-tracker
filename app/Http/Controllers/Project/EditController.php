<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\EditRequest;
use App\Models\Project;

class EditController extends Controller
{
    public function handle(EditRequest $request, Project $project)
    {
        $project->update($request->validated());

        return response($project);
    }
}
