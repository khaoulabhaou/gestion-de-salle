<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/xxxx_create_cours_table.php
class CreateCoursTable extends Migration
{
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->integer('duree'); // in minutes
            $table->integer('capacite_max');
            $table->float('prix');
            $table->foreignId('coach_id')->constrained('coaches');
            $table->enum('statut', ['PLANIFIE', 'EN_COURS', 'TERMINE', 'ANNULE'])->default('PLANIFIE');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
