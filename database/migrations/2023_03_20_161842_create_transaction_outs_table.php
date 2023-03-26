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
        Schema::create('transaction_outs', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('transaction_out_id');
            $table->string('payment_channel');
            $table->string('status')->default('PENDING');
            $table->string('amount');
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_outs');
    }
};
