<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nomor_hp');
            $table->string('nomor_rekam_medis')->unique();
            $table->text('alamat');
            $table->string('nama_kontak');
            $table->string('nomor_kontak');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};