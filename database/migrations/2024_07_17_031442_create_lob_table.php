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
        Schema::create('lob', function (Blueprint $table) {
            $table->id();
            $table->enum('lob', ['KUR', 'PEN', 'Produktif', 'Konsumtif', 'Suretyship']);
            $table->enum('claim_reason', ['Macet', 'Kebakaran', 'Meninggal', 'PHK']);
            $table->integer('amount_of_customer');
            $table->decimal('load_value', total: 12, places: 2);
            $table->dateTime('periode');
            $table->boolean('sended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lob');
    }
};
