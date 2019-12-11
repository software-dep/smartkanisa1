<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtaaDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtaa__donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mtaa_m_id');
            $table->unsignedInteger('donation_m_id');

            $table->foreign('mtaa_m_id')->references('id')->on('mtaas')->onDelete('cascade');
            $table->foreign('donation_m_id')->references('id')->on('donations')->onDelete('cascade');
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
        Schema::dropIfExists('mtaa__donations');
    }
}
