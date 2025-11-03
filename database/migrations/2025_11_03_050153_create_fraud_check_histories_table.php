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
        Schema::create('fraud_check_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('order_id');
            $table->integer('user_id');

            // Pathao orders
            $table->integer('pathao_total_orders')->default(0);
            $table->integer('pathao_success_order')->default(0);
            $table->integer('pathao_cancelled_order')->default(0);

            // Steadfast orders
            $table->integer('steadfast_total_orders')->default(0);
            $table->integer('steadfast_success_order')->default(0);
            $table->integer('steadfast_cancelled_order')->default(0);

            // Redex Orders
            $table->integer('redex_total_orders')->default(0);
            $table->integer('redex_success_order')->default(0);
            $table->integer('redex_cancelled_order')->default(0);

            $table->integer('total_orders')->default(0);
            $table->integer('success_orders')->default(0);
            $table->integer('cancelled_orders')->default(0);
            $table->integer('success_rate')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraud_check_histories');
    }
};
