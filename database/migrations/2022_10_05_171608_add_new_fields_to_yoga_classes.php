<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToYogaClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yoga_classes', function (Blueprint $table) {
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
            $table->dropColumn('lable');
            $table->dropColumn('subtitle');
            $table->dropColumn('expart_word');
            $table->dropColumn('training_duration');
            $table->dropColumn('other_language');
            $table->dropColumn('group_size');
            $table->dropColumn('health_hygiene');
            $table->dropColumn('hosting');
            $table->dropColumn('place_to_stay');
            $table->dropColumn('video');
            $table->dropColumn('map');
        });
    }
}
