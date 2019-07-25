<?php

namespace Laratube;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    
    
    public $incrementing = false;

    // allows for our models to have mass assignment by default
    protected $guarded = []; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
