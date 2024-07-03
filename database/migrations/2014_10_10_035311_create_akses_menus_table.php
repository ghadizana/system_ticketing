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
        Schema::create('akses_menus', function (Blueprint $table) {
            $table->id('idAksesMenu')->autoIncrement(false)->primary();
            $table->unsignedBigInteger('idMenu');
            $table->string('deskripsi');
            $table->string('label');
            $table->timestamps();

            $table->foreign('idMenu')->references('idMenu')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_menus');
    }
};
