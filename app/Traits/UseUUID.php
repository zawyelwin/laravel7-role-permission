<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UseUUID
{
    protected static function bootUseUUID()
    {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

}