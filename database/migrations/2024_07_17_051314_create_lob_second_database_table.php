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
        // Schema::connection($this->connection)->create('lob', function (Blueprint $table) {
        //     $table->id();
        //     $table->enum('lob', ['KUR', 'PEN']);
        //     $table->enum('claim_reason', ['Macet', 'Kebakaran', 'Meninggal', 'PHK']);
        //     $table->integer('amount_of_customer');
        //     $table->decimal('load_value', total: 12, places: 2);
        //     $table->dateTime('periode');
        //     $table->dateTime('send_date');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql2')->dropIfExists('lob');
    }
};
