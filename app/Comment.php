<?php

namespace Laratube;


class Comment extends Model
{

    //tells laravel which relationships to EAGER load
    protected $with = ['user', 'votes'];

    protected $appends = ['repliesCount'];


    public function getRepliesCountAttribute() {
        return $this->replies->count();
    }


    public function video() {
        return $this->belongsTo(Video::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'comment_id')->whereNotNull('comment_id');
    }

    public function votes () {
        return $this->morphMany(Vote::class, 'voteable');
    }
}
