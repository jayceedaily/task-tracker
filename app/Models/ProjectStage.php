<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasUuid;

class ProjectStage extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['project_id', 'name', 'order'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
