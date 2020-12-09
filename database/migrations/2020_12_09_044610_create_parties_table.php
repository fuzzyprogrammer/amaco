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
            $table->string('registration_no')->nullable();
            $table->string('vat_no')->nullable();
            $table->string('post_box_no')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('proviance')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('party_type')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('suffix')->nullable();
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('opening_balance')->nullable();
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
