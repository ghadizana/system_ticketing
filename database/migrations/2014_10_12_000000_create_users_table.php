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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('idProyek');
            $table->string('idKaryawan')->unique();
            $table->unsignedBigInteger('idGrupUser');
            $table->string('idDepartment');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);

            $table->foreign('idGrupUser')->references('idGrupUser')->on('grup_users');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
