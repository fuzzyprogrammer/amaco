<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('paid_by')->nullable();
            $table->unsignedBigInteger('referrence_bill_no')->nullable();
            $table->string('paid_date')->nullable();
            $table->string('paid_to')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('check_no')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_subject')->nullable();
            $table->string('description')->nullable();
            $table->string('is_paid')->default(false);
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
        Schema::dropIfExists('expenses');
    }
}
