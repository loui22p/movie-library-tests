<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $keyType = 'string'; 
    // use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['movieId', 'comment', 'user'];

    public function movie() {
        return $this->belongsTo(Movie::class, 'movieId');
    }
    public function user() {
        return $this->belongsTo(User::class,'user');
    }
    public function commentor() {
        return $this->belongsTo(User::class,'user'); 
    }
}