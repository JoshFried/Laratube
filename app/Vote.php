<?php

namespace Laratube;

class Vote extends Model
{
    // allow laravel to know other models can be polymporphic with vote
    public function voteable () {
        return $this->morphTo(); 
    }
}
