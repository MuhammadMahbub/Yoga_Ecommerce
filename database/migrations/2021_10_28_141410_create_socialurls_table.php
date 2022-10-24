<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialurlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialurls', function (Blueprint $table) {
            $table->id();
            $table->string('fb_url')->default('#');
            $table->string('instagram_url')->default('#');
            $table->string('youtube_url')->default('#');
            $table->string('twitter_url')->default('#');
            $table->string('linkedin_url')->default('#');
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
        Schema::dropIfExists('socialurls');
    }
}
