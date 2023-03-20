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
            $table->string('email')->nullable();
            $table->string('id_user');
            $table->string('game_name');
            $table->string('service');
            $table->string('zone_user')->nullable();
            $table->string('message')->nullable();

            // APIGAMES
            $table->string('trx_id')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('status_payment_apigames')->default('Pending');
            $table->string('price_rp_apigames')->nullable();
            $table->string('rate_apigames')->nullable();
            $table->string('message_apigames')->nullable();
            $table->string('sn_apigames')->nullable();
            $table->string('destination_apigames')->nullable();
            $table->string('product_code_apigames')->nullable();
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