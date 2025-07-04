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
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade');
        $table->dateTime('waktu');
        $table->boolean('tersedia')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
