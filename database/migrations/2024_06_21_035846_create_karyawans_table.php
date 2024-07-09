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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('foto');
            $table->string('nama', 100);
            $table->string('role', 100);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('no_telp', 100);
            $table->float('kinerja')->nullable();
            $table->integer('jumlah_tugas_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
