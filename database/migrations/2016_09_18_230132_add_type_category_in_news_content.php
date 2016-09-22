<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeCategoryInNewsContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_contents', function (Blueprint $table) {
            $table->enum('category',['news','event','aboutus','tips'])->after('image')->default('news');
            $table->integer('type')->after('category')->default(0);
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
            $table->dropColumn('category');
            $table->dropColumn('type');
			
        });
    }
}
