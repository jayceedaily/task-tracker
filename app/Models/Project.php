<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasUuid;

class Project extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'description'];

    protected $hidden = ['id', ];



    public function members()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Models\ProjectMember',
            'project_id',
            'id',
            'id',
            'user_id',
        )->select('project_members.role','project_members.project_id');
    }

    public function projectMembers()
    {
        return $this->hasMany('App\Models\ProjectMember');
    }
}
