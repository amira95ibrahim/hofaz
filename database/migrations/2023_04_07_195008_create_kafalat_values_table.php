<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKafalatValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafalat_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kafala_id')->constrained('kafalat')->restrictOnDelete();
            $table->foreignId('field_id')->constrained('kafala_fields')->restrictOnDelete();
            $table->text('value_en');
            $table->text('value_ar');
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
        Schema::dropIfExists('kafalat_values');
    }
}
