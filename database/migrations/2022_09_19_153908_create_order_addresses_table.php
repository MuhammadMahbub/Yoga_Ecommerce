<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('billing_first_name');
            $table->string('billing_last_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_company')->nullable();
            $table->text('billing_address_1')->nullable();
            $table->text('billing_address_2')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_postcode')->nullable(); 
            $table->string('billing_first_name2')->nullable();
            $table->string('billing_last_name2')->nullable(); 
            $table->string('billing_company2')->nullable();
            $table->text('billing_address_1_2')->nullable();
            $table->text('billing_address_2_2')->nullable();
            $table->string('billing_country_2')->nullable();
            $table->string('billing_city_2')->nullable();
            $table->string('billing_state_2')->nullable();
            $table->string('billing_postcode_2')->nullable();
            $table->text('order_note')->nullable(); 
            $table->string('shipping_same_address')->default('yes'); 
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
        Schema::dropIfExists('order_addresses');
    }
}
