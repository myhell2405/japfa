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
        Schema::create('pakans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable()->index();
            $table->string('nama');
            $table->string('type')->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained('mitras')->nullOnDelete();
            $table->decimal('price_per_unit', 12, 2)->nullable();
            $table->string('unit')->default('kg');
            $table->integer('stok_minimal')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakans');
    }
};
