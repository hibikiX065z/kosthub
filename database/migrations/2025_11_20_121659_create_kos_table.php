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
        Schema::create('kos', function (Blueprint $table) {
            $table->id();

            // Nama kos
            $table->string('nama_kos');

            // Lokasi kos
            $table->string('lokasi');

            // Harga kos
            $table->integer('harga');

            // Tipe kos → Putra / Putri / Campur
            $table->enum('tipe', ['Putra', 'Putri', 'Campur']);

            // Fasilitas (disimpan sebagai JSON)
            $table->json('fasilitas');

            // Pemilik kos
            $table->foreignId('owner_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
