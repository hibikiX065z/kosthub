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
        Schema::table('kos', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('biaya_tambahan');
        });
    }

    public function down()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
