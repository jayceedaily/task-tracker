<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogCreateRequest;
use App\Http\Requests\LogEditRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LogController extends Controller
{
    /**
     *
     * @param Request $request
     * @param Task $task
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws BindingResolutionException
     */
    public function index(Request $request, Task $task)
    {
        if($request->user()->cannot('view', $task->project)) {
            abort(403);
        }

        $logs = $request->user()->logs()->latest()->simplePaginate();

        return response($logs);
    }

    /**
     *
     * @param LogCreateRequest $request
     * @param Task $task
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws ValidationException
     * @throws BindingResolutionException
     */
    public function create(LogCreateRequest $request, Task $task)
    {
        if($request->user()->cannot('view', $task->project)) {
            abort(403);
        }

        $log = new Log($request->validated());

        $task->logs()->save($log);

        return response($log);
    }

    /**
     *
     * @param Request $request
     * @param Log $log
     * @return Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function show(Request $request, Log $log)
    {
        return response($log);
    }

    /**
     *
     * @param LogEditRequest $request
     * @param Log $log
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws ValidationException
     * @throws MassAssignmentException
     * @throws BindingResolutionException
     */
    public function edit(LogEditRequest $request, Log $log)
    {
        if($request->user()->cannot('view', $log))
        {
            abort(403);
        }

        $log->update($request->validated());

        return response($log);
    }

    /**
     *
     * @param Request $request
     * @param Log $log
     * @return Response|Illuminate\Contracts\Routing\ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function destroy(Request $request, Log $log)
    {
        if($request->user()->cannot('view', $log))
        {
            abort(403);
        }

        $log->delete();

        return response([
            'message' => __('project.delete_success')
        ]);
    }
}
