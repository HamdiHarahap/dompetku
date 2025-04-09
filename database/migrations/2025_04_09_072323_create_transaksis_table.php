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
        Schema::create('transaksis', function (Blueprint $table) { 
            $table->id();
            $table->string('keperluan');
            $table->decimal('jumlah', 15, 2);
            $table->foreignId('card_id')->constrained('cards');
            $table->enum('kategori', ['pengeluaran', 'pemasukan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
