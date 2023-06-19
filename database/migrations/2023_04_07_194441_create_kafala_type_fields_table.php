<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKafalaTypeFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafala_type_fields', function (Blueprint $table) {
            $table->foreignId('type_id')->constrained('kafala_types')->restrictOnDelete();
            $table->foreignId('field_id')->constrained('kafala_fields')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kafala_type_fields');
    }
}
