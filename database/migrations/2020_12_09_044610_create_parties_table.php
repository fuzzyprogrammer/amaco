<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('firm_name');
            $table->string('firm_name_in_ar')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('registration_no_in_ar')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('vat_no_in_ar')->nullable();
            $table->string('post_box_no')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('proviance')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('party_type')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('credit_days')->nullable();
            $table->string('credit_limit')->nullable();
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
        Schema::dropIfExists('parties');
    }
}
