<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRimRatioInTireSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tire_sizes', function (Blueprint $table) {
            $table->integer('rim_id')->after('size')->default(0);
            $table->integer('ratio_id')->after('rim_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tire_sizes', function (Blueprint $table) {
            $table->dropColumn('rim_id');
            $table->dropColumn('ratio_id');
        });
    }
}
