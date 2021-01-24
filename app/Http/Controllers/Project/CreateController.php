<?php

namespace App\Http\Controllers\Project;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateRequest;

class CreateController extends Controller
{
    public function handle(CreateRequest $request)
    {
        $project = Project::create($request->validated());

        return response($project);
    }
}
