<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonationMtaa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_mtaa', function (Blueprint $table) {
            $table->unsignedInteger('mtaa_id');
            $table->unsignedInteger('donation_id');

            $table->integer('amount');


            $table->foreign('mtaa_id')->references('id')->on('mtaas')->onDelete('cascade');
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
        Schema::dropIfExists('donation_mtaa');
    }
}
