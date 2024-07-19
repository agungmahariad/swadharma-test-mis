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
        // Schema::connection($this->connection)->create('record_data_activity', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('batch');
        //     $table->dateTime('send_date');
        //     $table->integer('amount_data');
        //     $table->boolean('send_status');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('record_data_activity');
    }
};
