<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldNewsContentIdInNewsContentRepos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_content_repos', function (Blueprint $table) {
            $table->integer('news_content_id')->after('id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_content_repos', function (Blueprint $table) {
            $table->dropColumn('news_content_id');
        });
    }
}
