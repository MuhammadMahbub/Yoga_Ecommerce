<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_status')->nullable();
            $table->string('order_type')->nullable();
            $table->string('order_total')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('customer_note')->nullable();
            $table->string('customer_ip')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_time')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_mobile')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('shipping_note')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('shipping_time')->nullable();
            $table->string('invoice_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
