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
        Schema::create('master_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_master_kategori');
            $table->string('slug_master_kategori');
            $table->text('desc')->nullable();
            $table->string('status')->default('active');
            $table->text('image_master_kategori')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kategoris');
    }
};