<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNewsContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_contents', function (Blueprint $table) {
        
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->text('brief');
            $table->text('description');
            $table->string('image');
            $table->enum('category',['article','evant','aboutus',''])->default('article');
            $table->integer('author_id')->unsigned();
            $table->integer('view')->default(0);
            $table->integer('share')->default(0);
            $table->enum('status',['publish','unpublish','deleted'])->default('unpublish');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')
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
        Schema::drop('news_contents');
    }
}
