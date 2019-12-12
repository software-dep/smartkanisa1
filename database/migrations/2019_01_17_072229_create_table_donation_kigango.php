<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonationKigango extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_kigango', function (Blueprint $table) {
            $table->unsignedInteger('kigango_id');
            $table->unsignedInteger('donation_id');

            $table->integer('amount');


            $table->foreign('kigango_id')->references('id')->on('kigangos')->onDelete('cascade');
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
        Schema::dropIfExists('donation_kigango');
    }
}
