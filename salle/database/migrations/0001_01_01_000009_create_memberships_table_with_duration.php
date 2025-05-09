<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTableWithDuration extends Migration
{
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Membership name (e.g., Basic, Standard, Premium)
            $table->text('description'); // Membership description
            $table->decimal('price', 8, 2); // Price of the membership
            $table->integer('duration')->default(1); // Duration in months (default is 1 month)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
