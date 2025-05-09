<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/xxxx_create_reservations_table.php
class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membre_id')->constrained('membres')->onDelete('cascade');
            $table->foreignId('cour_id')->constrained('cours')->onDelete('cascade');
            $table->dateTime('date_reservation')->useCurrent();
            $table->timestamps();
            
            $table->unique(['membre_id', 'cour_id']); // Prevent duplicate reservations
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
