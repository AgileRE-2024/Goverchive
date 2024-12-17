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
        Schema::create('tujuan-it', function (Blueprint $table) {
            $table->id();
            $table->string('dimensi',100)->nullable(false);
            $table->unsignedBigInteger('tujuanorganisasi_id')->nullable(false);
            $table->string('tujuanIt',500)->nullable(false);
            $table->foreign('tujuanorganisasi_id')->references('id')->on('tujuan-organisasi')->onDelete('cascade');

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
