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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('judul','100');
            $table->string('id_project','255');
            $table->string('pembuat','255');
            $table->string('penerima','255');
            $table->string('status','255');
            $table->date('tgl_dibuat');
            $table->date('deadline');
            $table->string('urugensi', '100');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
