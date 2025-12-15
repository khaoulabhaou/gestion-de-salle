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
    Schema::table('cours', function (Blueprint $table) {
        // 1. Add the column
        $table->unsignedBigInteger('category_id')->nullable()->after('id');

        // 2. Add the foreign key
        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onDelete('set null');

        // 3. Drop the old column
        $table->dropColumn('catégorie');
    });
}


    /**
     * Reverse the migrations.
     */
};