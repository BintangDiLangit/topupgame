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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('payment_channel');
            $table->string('status')->default('PENDING');
            $table->string('amount');
            $table->bigInteger('produk_id');
            $table->string('email')->nullable();
            $table->string('id_user')->nullable();
            $table->string('game_name')->nullable();
            $table->string('service')->nullable();
            $table->string('zone_user')->nullable();
            $table->string('message')->nullable();

            // Vendor
            $table->string('trx_id')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('status_payment_vendor')->default('PENDING');
            $table->string('price_rp_vendor')->nullable();
            $table->string('rate_vendor')->nullable();
            $table->string('message_vendor')->nullable();
            $table->string('sn_vendor')->nullable();
            $table->string('destination_vendor')->nullable();
            $table->string('product_code_vendor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};