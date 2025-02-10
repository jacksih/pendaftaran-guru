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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->constrained('periods');  // Relasi ke periode
            $table->string('name');  // Nama timeline (misal: pendaftaran awal)
            $table->timestamp('start_date');  // Tanggal mulai timeline
            $table->timestamp('end_date');    // Tanggal akhir timeline
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};
