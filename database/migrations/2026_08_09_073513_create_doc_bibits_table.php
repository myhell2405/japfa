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
        Schema::create('doc_bibits', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable()->index();
            $table->string('nama');
            $table->foreignId('supplier_id')->nullable()->constrained('mitras')->nullOnDelete();
            $table->string('batch_number')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('umur_hari')->nullable();
            $table->decimal('harga_satuan', 12, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_bibits');
    }
};
