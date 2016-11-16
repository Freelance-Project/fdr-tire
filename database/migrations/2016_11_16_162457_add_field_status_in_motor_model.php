<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldStatusInMotorModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motor_models', function (Blueprint $table) {
            $table->enum('status',['publish','unpublish'])->after('motor_type_id')->default('unpublish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motor_models', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
