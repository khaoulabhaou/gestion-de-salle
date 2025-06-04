<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('contact_messages', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // User reference
        $table->string('name');
        $table->string('email');
        $table->string('subject')->nullable();
        $table->text('message');
        $table->boolean('status')->default(false);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    });
}

public function down()
{
    Schema::dropIfExists('contact_messages');
}

};