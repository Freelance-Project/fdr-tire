<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInCareers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('id_number')->after('id');
            $table->string('fullname')->after('name');
            $table->enum('gender',['male','female','other'])->after('fullname')->default('male');
            $table->string('birthplace');
            $table->date('dob');
            $table->string('religion');
            $table->string('mobile');
            $table->string('phone');
            $table->string('npwp');
            $table->text('experience');
            $table->integer('province');
            $table->integer('city');
            $table->integer('district');
            $table->integer('subdistrict');
            $table->integer('postcode');
            $table->enum('status',['accept','posting']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn('id_number');
            $table->dropColumn('fullname');
            $table->dropColumn('gender');
            $table->dropColumn('birthplace');
            $table->dropColumn('dob');
            $table->dropColumn('religion');
            $table->dropColumn('mobile');
            $table->dropColumn('phone');
            $table->dropColumn('npwp');
            $table->dropColumn('experience');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('subdistrict');
            $table->dropColumn('postcode');
            $table->dropColumn('status');
        });
    }
}
