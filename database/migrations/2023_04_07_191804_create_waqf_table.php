<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaqfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waqf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained('countries')->restrictOnDelete();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('description_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->double('cost');
            $table->double('paid');
            $table->double('initial_amount');
            $table->boolean('show_remaining')->default(true);
            $table->boolean('active')->default(true);
            $table->string('image')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('waqf');
    }
}
