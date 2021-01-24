<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function booted()
    {
        static::creating(function($model){

            do {
                $uuid = Str::uuid();
            } while (self::where('uuid', $uuid)->exists());

            $model->uuid = $uuid;

            return $model;
        });
    }
}
