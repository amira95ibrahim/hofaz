<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketerProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketer_project', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('marketer_id')->constrained()->onDelete('cascade');
           // $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->integer('project_id');
        
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
        Schema::dropIfExists('marketer_project');
    }
}
