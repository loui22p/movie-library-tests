<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorMovieRelation extends Model
{
    // use HasFactory;

    public $timestamps = false;

    protected $table = 'movieActorRelations';

    protected $fillable = ['id', 'actorId', 'movieId'];


}