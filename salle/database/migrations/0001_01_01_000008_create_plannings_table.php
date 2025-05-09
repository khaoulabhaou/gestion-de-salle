<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/xxxx_create_plannings_table.php
class CreatePlanningsTable extends Migration
{
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->string('jour'); // Or use date() for specific dates
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->foreignId('cour_id')->constrained('cours');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plannings');
    }
};
