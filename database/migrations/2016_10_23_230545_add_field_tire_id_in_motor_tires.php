<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTireIdInMotorTires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motor_tires', function (Blueprint $table) {
            $table->integer('tire_id')->after('id')->unsigned();

            $table->foreign('tire_id')->references('id')->on('tires')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motor_tires', function (Blueprint $table) {
            $table->dropForeign(['tire_id']);
            $table->dropColumn('tire_id');
        });
    }
}
