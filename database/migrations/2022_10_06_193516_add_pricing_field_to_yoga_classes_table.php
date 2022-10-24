<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricingFieldToYogaClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yoga_classes', function (Blueprint $table) {
            
        $table->integer('duration_in_days')->nullable(); 
        $table->timestamp('discount_last_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yoga_classes', function (Blueprint $table) {
            $table->dropColumn('duration_in_days'); 
            $table->dropColumn('discount_last_date');
        });
    }
}
