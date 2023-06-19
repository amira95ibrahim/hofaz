<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title_ar');
            $table->string('site_title_en');
            $table->string('logo')->nullable();
            $table->text('keywords_ar');
            $table->text('keywords_en');
            $table->string('facebook');
            $table->string('whatsapp', 30);
            $table->string('googlePlus')->nullable();
            $table->string('instagram');
            $table->string('adminFooter');
            $table->string('frontWebsiteFooter_ar');
            $table->string('frontWebsiteFooter_en');
            $table->string('youtubeAddress');
            $table->string('twitterAddress');
            $table->string('location')->nullable();
            $table->string('phoneNumber', 30);
            $table->string('postalCode')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
