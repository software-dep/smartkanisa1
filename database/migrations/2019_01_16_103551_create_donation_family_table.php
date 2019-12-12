<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('familia_donation', function (Blueprint $table) {
            $table->unsignedInteger('family_id');
            $table->unsignedInteger('donation_id');

            $table->integer('amount');


            $table->foreign('family_id')->references('id')->on('familias')->onDelete('cascade');
            $table->foreign('donation_id')->references('id')->on('donations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('familia_donation');
    }
}
