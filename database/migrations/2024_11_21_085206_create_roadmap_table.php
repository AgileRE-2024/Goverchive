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
        Schema::create('roadmap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tahun_roadmap')->nullable(false);
            $table->string('kategori',100)->nullable(false);
            $table->unsignedBigInteger('tujuanIt')->nullable(false);
            $table->string('indikator',200)->nullable(false);
            $table->string('program',300)->nullable(false);
            $table->string('kegiatan',300)->nullable(false);
            $table->unsignedBigInteger('uic')->nullable(false);
            $table->string('baseline',400)->nullable(false);
            $table->string('target',400)->nullable(false);
            $table->string('realisasi',400)->nullable(false);
            $table->string('target_2',400)->nullable(false);
            $table->string('realisasi_2',400)->nullable(false);
            $table->foreign('tujuanIt')->references('id')->on('tujuan-it')->onDelete('cascade');
            $table->foreign('uic')->references('id')->on('unit-kerja')->onDelete('cascade');
            $table->foreign('tahun_roadmap')->references('id')->on('tahun_roadmap')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmap');
    }
};
