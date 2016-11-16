<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldCaptionInTableTire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->string('brief')->after('name');
            $table->string('banner')->after('image');
            $table->text('size')->after('overview');
            $table->enum('is_feature',['yes','no'])->after('banner')->default('no');
            $table->string('feature_caption')->after('is_feature');
            $table->enum('is_new',['yes','no'])->after('feature_caption')->default('no');
            $table->integer('sort')->default(0);
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
            $table->dropColumn('brief');
            $table->dropColumn('banner');
            $table->dropColumn('size');
            $table->dropColumn('is_feature');
            $table->dropColumn('feature_caption');
            $table->dropColumn('is_new');
            $table->dropColumn('sort');
        });
    }
}
