<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodocDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodoc_donation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained('donors')->restrictOnDelete();
            $table->double('amount');
            $table->string('model');
            $table->integer('model_id');
            $table->enum('payment_method', ['visa', 'knet']);
            $table->enum('status', ['INITIATED', 'CAPTURED', 'CANCELLED', 'DECLINED', 'FAILED'])->default('INITIATED');
            $table->text('notes')->nullable();
            $table->text('frequency');
            $table->text('duration');
            $table->text('Recurring_id');
            $table->integer('marketer_id')->nullable();

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
        Schema::dropIfExists('periodoc_donation');
    }
}
