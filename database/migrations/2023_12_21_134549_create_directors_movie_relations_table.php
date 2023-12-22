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
        Schema::create('directorsMovieRelations', function (Blueprint $table) {
            $table->id();
            $table->integer('actorId')->unsigned()->nullable();
            $table->integer('movieId')->unsigned()->nullable();
            $table->foreign('actorId')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('actorId')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directorsMovieRelations');
    }
};
