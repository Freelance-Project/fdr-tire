<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMotorTireCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_tire_categories', function (Blueprint $table) {
        
            $table->increments('id');
            $table->integer('motor_type_id')->unsigned();
            $table->integer('tire_category_id')->unsigned();
            $table->timestamps();

            $table->foreign('motor_type_id')->references('id')->on('motor_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('tire_category_id')->references('id')->on('tire_categories')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('motor_tire_categories');
    }
}
