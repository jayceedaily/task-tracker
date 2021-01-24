<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasUuid;

class Project extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'description'];

    protected $hidden = ['id'];
}
