<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('font');
            $table->string('text_color');
            $table->string('sender_x');
            $table->string('sender_y');
            $table->string('receiver_x');
            $table->string('receiver_y');
            $table->string('project_x');
            $table->string('project_y');
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
        Schema::dropIfExists('gift_templates');
    }
}
