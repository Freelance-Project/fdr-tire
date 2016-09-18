<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCareerSubmits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_submits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('career_id')->unsigned();
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('school');
            $table->string('major');
            $table->string('year_entry');
            $table->string('graduation_year');
            $table->string('gpa');
            $table->string('un');
            $table->string('uas');
            $table->enum('level',['sma','kuliah']);
            $table->timestamps();

            $table->foreign('career_id')->references('id')->on('careers')
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
        Schema::drop('career_submits');
    }
}
