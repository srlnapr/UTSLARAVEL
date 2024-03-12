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
        Schema::create('hewan', function (Blueprint $table) {
            $table->id('ID_hewan');
            $table->string('Nama_Hewan');
            $table->string('Jenis_Hewan');
            $table->integer('Usia_Hewan')->nullable();
            $table->decimal('Harga_Hewan', 10, 2)->nullable();
            $table->text('Deskripsi_Hewan')->nullable();
            $table->integer('Stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};
