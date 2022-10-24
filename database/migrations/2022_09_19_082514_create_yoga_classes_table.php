<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYogaClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoga_classes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->timestamp('date');
            $table->string('time');
            $table->integer('price');
            $table->string('image');
            $table->string('discount')->nullable();
            $table->longText('short_description');
            $table->longText('description');
            $table->string('status')->default('active');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('yoga_classes');
    }
}
