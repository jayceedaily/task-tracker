<?php

namespace App\Http\Controllers\ProjectMember;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function handle(Request $request, Project $project)
    {
        return response($project->projectMembers()->with('user')->simplePaginate());
    }
}
