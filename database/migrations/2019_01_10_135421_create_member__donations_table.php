<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member__donations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('member_m_id');
            $table->unsignedInteger('donation_m_id');


            $table->foreign('member_m_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::dropIfExists('member__donations');
    }
}
