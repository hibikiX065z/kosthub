<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Kos
        Schema::create('kos', function (Blueprint $table) {
            $table->id();

            // Owner
            $table->unsignedBigInteger('user_id');

            // Step 1 — Informasi Dasar
            $table->string('nama_kos');
            $table->string('tipe'); // putra / putri / campur
            $table->text('deskripsi')->nullable();
            $table->text('catatan')->nullable();

            // Step 2 — Lokasi
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->text('catatan_alamat')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Step 3 — Foto
            $table->string('foto_depan')->nullable();
            $table->string('foto_jalan')->nullable();
            $table->string('foto_kamar')->nullable();
            $table->string('foto_kamar_mandi')->nullable();
            $table->string('foto_lain')->nullable();

            // Step 4 — Fasilitas (JSON)
            $table->json('fasilitas_umum')->nullable();
            $table->json('fasilitas_kamar')->nullable();
            $table->json('fasilitas_kamar_mandi')->nullable();
            $table->json('parkir')->nullable();

            // Step 5 — Kamar
            $table->integer('total_kamar');
            $table->integer('kamar_tersedia');

            // Step 6 — Harga
            $table->integer('harga_per_bulan');
            $table->string('biaya_tambahan')->nullable();

            $table->timestamps();

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Tabel Reviews
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kos_id')->constrained('kos')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('rating'); // 1-5
            $table->text('comment')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('kos');
    }
};
