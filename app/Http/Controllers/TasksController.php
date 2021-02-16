<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskEditRequest;

class TasksController extends Controller
{
    public function index(Request $request, Project $project)
    {
        if($request->user()->cannot('view', $project))
        {
            abort(403);
        }

        return response($project->tasks()->simplePaginate());
    }

    public function create(TaskCreateRequest $request, Project $project)
    {
        if($request->user()->cannot('view', $project))
        {
            abort(403);
        }

        $task = new Task($request->validated());

        $project->tasks()->save($task);

        return response($task, 201);
    }

    public function show(Request $request, Task $task)
    {
        if($request->user()->cannot('view', $task->project))
        {
            abort(403);
        }

        return response($task);
    }

    public function edit(TaskEditRequest $request, Task $task)
    {
        if($request->user()->cannot('view', $task->project))
        {
            abort(403);
        }

        $task->update($request->validated());

        return response($task);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response([
            'message' => __('task.delete_success')
        ]);
    }
}
