<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // use HasFactory;

    protected $movies = 'movies';

    protected $fillable = ['id', 'name', 'imageReference', 'description', 'actors'];

    public $timestamps = false;

    public function actors() {
        return $this->belongsToMany(Actor::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'movieId');
    }
}
