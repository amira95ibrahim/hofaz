<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomepageColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('homepage')->default(false);
        });
        Schema::table('waqf', function (Blueprint $table) {
            $table->boolean('homepage')->default(false);
        });
        Schema::table('relief', function (Blueprint $table) {
            $table->boolean('homepage')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('homepage');
        });
        Schema::table('waqf', function (Blueprint $table) {
            $table->dropColumn('homepage');
        });
        Schema::table('reliefs', function (Blueprint $table) {
            $table->dropColumn('homepage');
        });
    }
}
