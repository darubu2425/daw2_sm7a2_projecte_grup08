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
        Schema::create('alumnes', function (Blueprint $table) {
            $table->id('identificador');
            $table->string('nom');
            $table->string('correu')->unique();
            $table->string('adreça');
            $table->string('ciutat');
            $table->string('pais');
            $table->string('telefon');
            $table->foreignId('master')->constrained('masters','identificador')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnes');
    }
};
