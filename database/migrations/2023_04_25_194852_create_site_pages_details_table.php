<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitePagesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_pages_details', function (Blueprint $table) {
            $table->id();
            $table->string('model')->unique();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('details_en');
            $table->text('details_ar');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_pages_details');
    }
}
