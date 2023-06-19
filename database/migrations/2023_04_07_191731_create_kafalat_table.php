<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKafalatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafalat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('kafala_types')->restrictOnDelete();
            $table->foreignId('country_id')->constrained('countries')->restrictOnDelete();
            $table->string('name_en');
            $table->string('name_ar');
            $table->double('monthly_amount');
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
        Schema::dropIfExists('kafalat');
    }
}
