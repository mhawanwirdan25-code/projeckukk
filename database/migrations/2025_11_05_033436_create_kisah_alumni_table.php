<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kisah_alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('angkatan');
            $table->text('cerita');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kisah_alumnis');
    }
};
