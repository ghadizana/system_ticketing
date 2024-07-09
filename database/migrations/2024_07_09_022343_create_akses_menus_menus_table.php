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
        Schema::create('akses_menus_menus', function (Blueprint $table) {
            $table->unsignedBigInteger('idAksesMenu');
            $table->unsignedBigInteger('idMenu');

            $table->foreign('idAksesMenu')->references('idAksesMenu')->on('akses_menus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idMenu')->references('idMenu')->on('menus')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_menus_menus');
    }
};
