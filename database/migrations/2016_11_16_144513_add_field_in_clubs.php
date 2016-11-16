<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('password')->after('logo');
            $table->string('admin_name')->after('password');
            $table->string('image_cover')->after('admin_name');
            $table->text('intro')->after('image_cover');
            $table->text('description')->after('intro');
            $table->string('address')->after('description');
            $table->string('contact')->after('address');
            $table->string('website')->after('contact');
            $table->string('fb')->after('website');
            $table->string('twitter')->after('fb');
            $table->string('gplus')->after('twitter');
            $table->string('other_socmed')->after('gplus');
            $table->enum('status',['pending','approved','deleted'])->after('other_socmed');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('admin_name');
            $table->dropColumn('image_cover');
            $table->dropColumn('intro');
            $table->dropColumn('description');
            $table->dropColumn('address');
            $table->dropColumn('contact');
            $table->dropColumn('website');
            $table->dropColumn('fb');
            $table->dropColumn('twitter');
            $table->dropColumn('gplus');
            $table->dropColumn('other_socmed');
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
        });
    }
}
