<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTireType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_tires', function (Blueprint $table) {
        
            $table->increments('id');
            $table->integer('motor_type_id')->unsigned();
            $table->integer('tire_category_id')->unsigned();
            $table->integer('tire_size_id')->unsigned();
            $table->integer('tire_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('motor_type_id')->references('id')->on('motor_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('tire_category_id')->references('id')->on('tire_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('tire_size_id')->references('id')->on('tire_sizes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('tire_type_id')->references('id')->on('tire_tipes')
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
        Schema::drop('motor_tires');
    }
}
