<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSocialurlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socialurls', function (Blueprint $table) {
            $table->string('fb_status')->default('show');
            $table->string('instagram_status')->default('show');
            $table->string('youtube_status')->default('show');
            $table->string('twitter_status')->default('show');
            $table->string('linkedin_status')->default('show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socialurls', function (Blueprint $table) {
            $table->dropColumn('fb_status');
            $table->dropColumn('instagram_status');
            $table->dropColumn('youtube_status');
            $table->dropColumn('twitter_status');
            $table->dropColumn('linkedin_status');
        });
    }
}
