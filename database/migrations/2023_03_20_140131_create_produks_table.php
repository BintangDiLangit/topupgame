<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nama');
            $table->bigInteger('vendor_id')->nullable();
            $table->bigInteger('kategori_id');
            $table->string('jumlah')->nullable();
            $table->string('harga_beli');
            $table->string('harga_jual')->nullable();
            $table->string('price_unit');
            $table->string('slug')->nullable();
            $table->string('status')->default('active');
            $table->text('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};