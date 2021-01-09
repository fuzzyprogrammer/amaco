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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('paid_by');
            $table->unsignedBigInteger('referrence_bill_no');
            $table->string('paid_date');
            $table->string('paid_to');
            $table->string('amount');
            $table->string('payment_type');
            $table->string('check_no');
            $table->string('transaction_id');
            $table->string('payment_subject');
            $table->string('description');
            $table->string('is_paid');
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
