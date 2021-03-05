<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['project_stage_id', 'name', 'description'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
