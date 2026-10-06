<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_karyas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('jurusan');
            $table->string('foto')->nullable();
            $table->string('judul');
            $table->string('siswa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('harga')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_karyas');
    }
};