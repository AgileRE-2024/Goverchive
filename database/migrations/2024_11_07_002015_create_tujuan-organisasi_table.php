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
        Schema::create('tujuan-organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('dimensi',100)->nullable(false);
            $table->string('egoal',100)->nullable(false);
            $table->string('tujuan-organisasi',500)->nullable(false);

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
