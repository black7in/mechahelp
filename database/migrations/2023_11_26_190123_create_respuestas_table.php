<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assistance_id');
            $table->unsignedBigInteger('workshop_id');
            $table->string('title');
            $table->string('description');
            $table->integer('time');
            $table->integer('price');
            $table->integer('status'); // 0 en espera o expirado / 1 aceptado
            $table->timestamps();

            $table->foreign('assistance_id')->references('id')->on('assistances');
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
