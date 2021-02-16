<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasUuid;

class Project extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'description'];

    public function members()
    {
        return $this->hasMany('App\Models\ProjectMember');
    }

    public function stages()
    {
        return $this->hasMany('App\Models\ProjectStage');
    }

    public function tasks()
    {
        return $this->hasManyThrough('App\Models\Task', 'App\Models\ProjectStage');
    }
}
