<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFullTextColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name_en')->fulltext()->change();
            $table->string('name_ar')->fulltext()->change();
            $table->string('description_en')->nullable()->fulltext()->change();
            $table->string('description_ar')->nullable()->fulltext()->change();
        });

        Schema::table('relief', function (Blueprint $table) {
            $table->string('name_en')->fulltext()->change();
            $table->string('name_ar')->fulltext()->change();
            $table->string('description_en')->nullable()->fulltext()->change();
            $table->string('description_ar')->nullable()->fulltext()->change();
        });

        Schema::table('waqf', function (Blueprint $table) {
            $table->string('name_en')->fulltext()->change();
            $table->string('name_ar')->fulltext()->change();
            $table->string('description_en')->nullable()->fulltext()->change();
            $table->string('description_ar')->nullable()->fulltext()->change();
        });

        Schema::table('kafalat', function (Blueprint $table) {
            $table->string('name_en')->fulltext()->change();
            $table->string('name_ar')->fulltext()->change();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('name_en')->fulltext()->change();
            $table->string('name_ar')->fulltext()->change();
            $table->text('description_en')->fulltext()->change();
            $table->text('description_ar')->fulltext()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
