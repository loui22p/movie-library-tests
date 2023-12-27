<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //use HasFactory;

    public $timestamps = false;

    protected $Persons = 'Persons'; 

    protected $column = ['id','name', 'imageReference', 'description'];
}
