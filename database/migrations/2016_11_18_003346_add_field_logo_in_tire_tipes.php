<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldLogoInTireTipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tire_tipes', function (Blueprint $table) {
            $table->string('logo')->after('name');
            $table->string('banner')->after('logo');
            $table->integer('sort')->after('banner')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tire_tipes', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('banner');
            $table->dropColumn('sort');
        });
    }
}
