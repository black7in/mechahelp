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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technician_id');
            $table->unsignedBigInteger('assistance_id');
            $table->string('title')->default('');
            $table->string('ref')->default('');
            $table->string('detail')->default('');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('technician_id')->references('id')->on('technicians');
            $table->foreign('assistance_id')->references('id')->on('assistances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
