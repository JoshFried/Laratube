<?php

namespace Laratube;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Channel extends Model implements HasMedia
{

    use HasMediaTrait; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image() {
        if ($this->media->first()) {
            return $this->media()->first()->getUrl('thumb');
        }
    }


    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
        ->width(100)
        ->height(100);
    }

    public function editable() { 
        if (!auth()->check()){
            return false; 
        }
        return $this->user_id === auth()->user()->id; 
    }
}