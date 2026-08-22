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
        Schema::create('kelas_bobot_hargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('bobot_min', 8, 2)->nullable();
            $table->decimal('bobot_max', 8, 2)->nullable();
            $table->decimal('harga_per_kg', 12, 2)->nullable();
            $table->string('currency')->default('IDR');
            $table->boolean('aktif')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_bobot_hargas');
    }
};
