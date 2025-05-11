<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_cancelled_memberships_table.php

public function up()
{
    Schema::create('cancelled_memberships', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('membership_id')->constrained('memberships')->onDelete('cascade');
        $table->timestamp('cancellation_date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cancelled_memberships');
}

};
