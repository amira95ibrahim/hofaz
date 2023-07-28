<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketerIdToDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
           // $table->foreignId('marketer_id')->after('donor_id')->constrained()->onDelete('cascade');
           $table->foreignId('marketer_id')->nullable()->after('donor_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign(['marketer_id']);
            $table->dropColumn('marketer_id');
        });
    }
}
