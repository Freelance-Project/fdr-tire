<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToNewsContentsTable extends Migration
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
            $table->integer('parent_id')->after('id')->nullable();

            DB::statement("ALTER TABLE news_contents CHANGE COLUMN category category ENUM('news','event','aboutus','tips','tire-maintenance','tire-safety','foto','video','faq','ecard','club-event')");
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
            $table->dropColumn('parent_id');

            DB::statement("ALTER TABLE news_contents CHANGE COLUMN category category ENUM('news','event','aboutus','tips')");
        });
    }
}
