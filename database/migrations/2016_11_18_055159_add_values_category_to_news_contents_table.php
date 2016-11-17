<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValuesCategoryToNewsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_contents', function (Blueprint $table) {
           DB::statement("ALTER TABLE news_contents CHANGE COLUMN category category ENUM('news','event','aboutus','tips','tire-teknology','tire-knowledge','tire-maintenance','tire-safety','foto','video','faq','ecard','download','jobfair','club-event','instagram','fdrnews','mediahighlights','award','csr','profile','racing','vision','contact')");
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
           DB::statement("ALTER TABLE news_contents CHANGE COLUMN category category ENUM('news','event','aboutus','tips','tire-teknology','tire-knowledge','tire-maintenance','tire-safety','foto','video','faq','ecard','download','jobfair','club-event','fdrnews','mediahighlights','award','csr','profile','racing','vision','contact')");
        });
    }
}
