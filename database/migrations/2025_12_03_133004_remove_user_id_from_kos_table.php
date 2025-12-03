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
        Schema::table('kos', function ($table) {

            // Hapus foreign key dahulu
            $table->dropForeign(['user_id']);

            // Hapus kolom
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('kos', function ($table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
