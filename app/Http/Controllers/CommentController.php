<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\CommentEditRequest;

class CommentController extends Controller
{
    public const COMMENTABLE = [
        'task'      => 'App\Models\Task',
        'project'   => 'App\Models\Project',
        'log'       => 'App\Models\Log',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $commentable, $uuid)
    {
        $$commentable = self::COMMENTABLE[$commentable]::where('uuid', $uuid)->firstOrFail();

        $comments = $$commentable->comments()->latest()->simplePaginate();

        return response($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CommentCreateRequest $request, $commentable, $uuid)
    {
        $$commentable = self::COMMENTABLE[$commentable]::where('uuid', $uuid)->firstOrFail();

        $comment = $$commentable->comments()->save($request->validated());

        return response($comment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return response($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentEditRequest $request ,Comment $comment)
    {
        $comment->update($request->validated());

        return response($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response([
            'message' => __('task.delete_success')
        ]);
    }
}
