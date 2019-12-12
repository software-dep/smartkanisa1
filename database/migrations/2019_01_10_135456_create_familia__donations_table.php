<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familia__donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('familia_f_id');
            $table->unsignedInteger('donation_f_id');

            $table->foreign('familia_f_id')->references('id')->on('familias')->onDelete('cascade');
            $table->foreign('donation_f_id')->references('id')->on('donations')->onDelete('cascade');
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
        Schema::dropIfExists('familia__donations');
    }
}
