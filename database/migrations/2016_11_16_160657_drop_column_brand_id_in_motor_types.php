<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnBrandIdInMotorTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motor_types', function (Blueprint $table) {
            $table->dropForeign(['motor_brand_id']);
            $table->dropColumn('motor_brand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motor_types', function (Blueprint $table) {
            $table->integer('motor_brand_id')->after('name')->unsigned();
            $table->foreign('motor_brand_id')->references('id')->on('motor_brands')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
