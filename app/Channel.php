<?php

namespace Laratube;


class Channel extends Model
{
    public function channel(){
        return $this->belongsTo(User::class);
    }
}