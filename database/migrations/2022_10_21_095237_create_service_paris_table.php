<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceParisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_paris', function (Blueprint $table) {
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
            $table->integer('duration_in_days')->nullable(); 
            $table->timestamp('discount_last_date')->nullable();
            $table->string('file')->nullable();
            $table->longText('lable')->nullable();
            $table->longText('subtitle')->nullable();
            $table->longText('expart_word')->nullable();
            $table->longText('training_duration')->nullable();
            $table->longText('other_language')->nullable();
            $table->longText('group_size')->nullable();
            $table->longText('health_hygiene')->nullable();
            $table->longText('hosting')->nullable();
            $table->longText('place_to_stay')->nullable();
            $table->longText('video')->nullable();
            $table->longText('map')->nullable();
            $table->longText('slug')->nullable();
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
        Schema::dropIfExists('service_paris');
    }
}
