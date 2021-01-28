<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;

class ProjectMember extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['user_id', 'project_id', 'role'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
