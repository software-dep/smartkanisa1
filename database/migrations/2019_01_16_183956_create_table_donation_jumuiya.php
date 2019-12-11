<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonationJumuiya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_jumuiya', function (Blueprint $table) {
            $table->unsignedInteger('jumuiya_id');
            $table->unsignedInteger('donation_id');

            $table->integer('amount');


            $table->foreign('jumuiya_id')->references('id')->on('jumuiyas')->onDelete('cascade');
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
        Schema::dropIfExists('donation_jumuiya');
    }
}
