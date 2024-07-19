<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql2';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::connection($this->connection)->create('log_activity', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->dateTime('activity_date');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('log_activity');
    }
};
