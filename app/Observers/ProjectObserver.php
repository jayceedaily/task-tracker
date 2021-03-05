<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\ProjectMember;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        ProjectMember::create([
            'user_id'       => $project->created_by,
            'project_id'    => $project->id,
            'role'          => 'owner',
        ]);

        ProjectStage::create([
            'project_id'    => $project->id,
            'name'          => 'To-do',
            'order'         => 1,
        ]);

        ProjectStage::create([
            'project_id'    => $project->id,
            'name'          => 'Pending',
            'order'         => 2,
        ]);

        ProjectStage::create([
            'project_id'    => $project->id,
            'name'          => 'Completed',
            'order'         => 3,
        ]);
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        switch($project->stage->action) {

            case 'start':

                $project->started_at = now();
                $project->started_by = $project->updated_by;
                $project->save();

                break;

            case 'complete':
                $project->completed_at = now();
                $project->completed_by = $project->updated_by;
                $project->save();

                break;
        }
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {

    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
