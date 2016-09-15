<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMotorTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_types', function (Blueprint $table) {
        
            $table->increments('id');
            $table->string('name');
            $table->integer('motor_brand_id')->unsigned();
            $table->timestamps();

            $table->foreign('motor_brand_id')->references('id')->on('motor_brands')
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
        Schema::drop('motor_types');
    }
}
