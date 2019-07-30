<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laratube\Model;
use Faker\Generator as Faker;
use Laratube\Video;

$factory->define(Video::class, function (Faker $faker) {
    return [
        
        // $table->uuid('channel_id');
        // $table->bigInteger('views')->default(0);
        // $table->string('thumbnail')->nullable(); 
        // $table->integer('percentage')->nullable();
        // $table->string('title')->nullable();
        // $table->text('description')->nullable();
        // $table->string('path');
        'channel_id' => function() {
            return factory(Channel::class)->create()->id;
        }, 
        'views' => $faker->numberBetween(1, 1000),
        'thumbnail' => $faker->imageUrl(), 
        'percentage' => 100, 
        'title' => $faker->sentence(4), 
        'description' => $faker->sentence(10), 
        'path' => $faker->word()


    ];
});
