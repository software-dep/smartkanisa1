<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_member', function (Blueprint $table) {

            $table->unsignedInteger('member_m_id');
            $table->unsignedInteger('donation_m_id');

            $table->integer('amount');


            $table->foreign('member_m_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('donation_m_id')->references('id')->on('donations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_member');
    }
}
