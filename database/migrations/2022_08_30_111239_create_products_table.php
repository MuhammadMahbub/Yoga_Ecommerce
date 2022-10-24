<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('sku');
            $table->longText('short_description');
            $table->longText('long_description')->nullable();
            $table->string('image')->default('default.png');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('discount', 10, 2)->nullable();
            $table->integer('quantity');
            $table->integer('category_id');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('products');
    }
}
