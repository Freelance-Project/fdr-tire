<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {

            $table->integer('parent_id')->after('id')->nullable();
            $table->enum('category',['technology','knowledge','safety','maintenance'])->after('description')->default('safety');
            $table->text('image')->after('rating');
            $table->integer('author_id')->after('image')->unsigned();
            $table->integer('ordering')->after('author_id');
            $table->enum('status',['y','n'])->after('ordering')->default('n');

            $table->foreign('author_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tires', function (Blueprint $table) {

            $table->dropColumn('parent_id');
            $table->dropColumn('category');
            $table->dropColumn('image');
            $table->dropColumn('ordering');
            $table->dropColumn('status');
            //
        });
    }
}
