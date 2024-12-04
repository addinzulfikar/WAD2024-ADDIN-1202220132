<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('kode_dosen', 3)->unique(); // 3 karakter unik
            $table->string('nama_dosen'); // Nama dosen
            $table->string('nip')->unique(); // NIP unik
            $table->string('email')->unique(); // Email unik
            $table->string('no_telepon')->nullable(); // Nomor telepon, nullable
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
};
