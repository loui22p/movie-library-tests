<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Person;
use App\Models\Movie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movieActorRelations', function (Blueprint $table) {
            $table->id();
            $table->integer('actorId')->unsigned()->index();
            $table->integer('movieId')->unsigned()->index();
            $table->foreign('actorId')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('actorId')->references('id')->on('movies')->onDelete('cascade');
            // $table->foreignIdFor(Person::class, 'actorId')->constrained();
            // $table->foreignIdFor(Movie::class, 'movieId')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movieActorRelations');
    }
};
