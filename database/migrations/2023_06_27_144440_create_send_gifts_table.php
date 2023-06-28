<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('sender')->nullable();
            $table->string('consignee')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('card')->nullable();
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
        Schema::dropIfExists('send_gifts');
    }
}
