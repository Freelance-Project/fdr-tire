<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMotorModelIdInMotorTires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motor_tires', function (Blueprint $table) {
            $table->integer('motor_model_id')->after('tire_id')->unsigned();

            $table->foreign('motor_model_id')->references('id')->on('motor_models')->onUpdate('cascade')->onDelete('cascade');
            
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
            $table->dropForeign(['motor_model_id']);
            $table->dropColumn('motor_model_id');
        });
    }
}
