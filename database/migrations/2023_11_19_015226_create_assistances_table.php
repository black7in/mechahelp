<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('workshop_id')->nullable();
            $table->string('title');
            $table->string('description');
            $table->float('lat');
            $table->float('lng');
            $table->integer('status'); // 0 Enviado/Recibido // 1 En espera de ser asignado un tecnico  |  // 2 En proceso con tecnico // 3 Pagar  // 4 Finalizado
            $table->float('price')->default(0);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('workshop_id')->references('id')->on('workshops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
