<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatoleoMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matoleo_member', function (Blueprint $table) {
            
              $table->unsignedInteger('member_id');
              $table->unsignedInteger('matoleo_id');
              $table->string('sadaka');
              $table->string('shukrani');

            // $table->timestamps();
            $table->foreign('matoleo_id')->references('id')->on('matoleos')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matoleo_member');
    }
}
