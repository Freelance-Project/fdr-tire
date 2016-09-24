<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateEventToNewsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_contents', function (Blueprint $table) {
            //
            $table->date('start_date')->after('share');
            $table->date('end_date')->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_contents', function (Blueprint $table) {
            //
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
