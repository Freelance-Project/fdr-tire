<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColmnMotorTypeInMotorTireCat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motor_tire_categories', function (Blueprint $table) {
            $table->dropForeign(['motor_type_id']);
            $table->dropColumn('motor_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motor_tire_categories', function (Blueprint $table) {
            $table->integer('motor_type_id')->after('id')->unsigned();

            $table->foreign('motor_type_id')->references('id')->on('motor_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
