<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_tokos', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('nama_toko');
            $table->text('deskripsi')->nullable();
            $table->string('kontak')->nullable();
            $table->text('lokasi')->nullable();
            $table->string('logo_toko')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_tokos');
    }
};