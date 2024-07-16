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
        Schema::create('grup_users', function (Blueprint $table) {
            $table->id('idGrupUser');
            $table->string('grupUser');
            $table->unsignedBigInteger('idAksesMenu');

            $table->timestamps();
            $table->foreign('idAksesMenu')->references('idAksesMenu')->on('akses_menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grup_users');
    }
};
