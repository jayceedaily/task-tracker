<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasUuid;

class ProjectStage extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['project_id', 'name', 'order'];
}
