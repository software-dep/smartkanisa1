<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKigangoDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kigango__donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kigango_k_id');
            $table->unsignedInteger('donation_k_id');

            $table->foreign('kigango_k_id')->references('id')->on('kigangos')->onDelete('cascade');
            $table->foreign('donation_k_id')->references('id')->on('donations')->onDelete('cascade');
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
        Schema::dropIfExists('kigango__donations');
    }
}
