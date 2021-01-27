<?php

namespace App\Models;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public function save(Array $options = [])
    {
        if(Auth::check() && Schema::hasColumn($this->getTable(), 'created_by')) {

            $this->created_by = Auth::user()->id;
            $this->updated_by = Auth::user()->id;
        };

        return parent::save($options);
    }

}
