<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJumuiyaDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumuiya__donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jumuiya_j_id');
            $table->unsignedInteger('donation_j_id');

            $table->foreign('jumuiya_j_id')->references('id')->on('jumuiyas')->onDelete('cascade');
            $table->foreign('donation_j_id')->references('id')->on('donations')->onDelete('cascade');
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
        Schema::dropIfExists('jumuiya__donations');
    }
}
