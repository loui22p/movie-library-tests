<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /**
    //  * Not sure if this is correct, as it is not the same in the schema file
    //  */
    // public function up(): void
    // {
    //     Schema::create('personal_access_tokens', function (Blueprint $table) {
    //         $table->id();
    //         $table->morphs('tokenable');
    //         $table->string('name');
    //         $table->string('token', 64)->unique();
    //         $table->text('abilities')->nullable();
    //         $table->timestamp('last_used_at')->nullable();
    //         $table->timestamp('expires_at')->nullable();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('personal_access_tokens');
    // }
    
};
