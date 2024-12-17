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
        Schema::create('unit-kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi',100)->nullable(false);
            $table->string('deskripsi_unit',500)->nullable(false);
            $table->string('tugas_pokok',500)->nullable(false);
            $table->string('uic',100)->nullable(false);
            $table->string('alamat',300)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
