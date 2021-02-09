<?php

namespace App\Http\Controllers\ProjectStage;

use App\Models\ProjectStage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{

    public function handle(Request $request, ProjectStage $projectStage)
    {

        if($request->user()->cannot('edit', $projectStage->project))
        {
            abort(403);
        }

        $projectStage->update($request->validated());

        return response($projectStage);
    }
}
