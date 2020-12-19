<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('party_id')->nullable();
            $table->unsignedBigInteger('rfq_id')->nullable();
            $table->string('status')->nullable();
            $table->string('total_value')->nullable();
            $table->string('discount_in_%')->nullable();
            $table->string('vat_in_value')->nullable();
            $table->string('net_amount')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
