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

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            // Owner
            $table->unsignedBigInteger('pemilik_id');

            // Informasi Dasar
            $table->string('nama_kos');
            $table->string('tipe');
            $table->text('deskripsi')->nullable();
            $table->text('catatan')->nullable();

            // Lokasi
            $table->string('alamat');
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->text('catatan_alamat')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Foto
            $table->string('foto_depan')->nullable();
            $table->string('foto_jalan')->nullable();
            $table->string('foto_kamar')->nullable();
            $table->string('foto_kamar_mandi')->nullable();
            $table->string('foto_lain')->nullable();

            // Fasilitas
            $table->json('fasilitas_umum')->nullable();
            $table->json('fasilitas_kamar')->nullable();
            $table->json('fasilitas_kamar_mandi')->nullable();
            $table->json('parkir')->nullable();

            // Kamar
            $table->integer('total_kamar');
            $table->integer('kamar_tersedia');

            // Harga
            $table->integer('harga_per_bulan');
            $table->string('biaya_tambahan')->nullable();

            $table->timestamps();

            // Foreign Key
            $table->foreign('pemilik_id')->references('id')->on('users')->onDelete('cascade');

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
