<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSortInNewsContentRepos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_content_repos', function (Blueprint $table) {
            $table->integer('sort')->after('file')->default(0);
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
            $table->dropColumn('sort');
        });
    }
}
