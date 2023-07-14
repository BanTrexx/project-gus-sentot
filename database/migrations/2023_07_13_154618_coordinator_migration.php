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
        Schema::create('coordinator', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id');
            $table->string('name');
            $table->integer('nik');
            $table->string('address');
            $table->timestamps();
            $table->foreign('village_id')->references('id')->on('village');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinator');
    }
};
