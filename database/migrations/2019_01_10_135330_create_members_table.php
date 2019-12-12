<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name');
            $table->string('baba');
            $table->string('mama');
            $table->string('gender');
            $table->string('mahali');
            $table->date('tarehe_kuzaliwa');
            $table->string('mji');
            $table->date('tarehe_kubatizwa');
            $table->integer('no_ubatizo');

            $table->string('parokia_ubatizo');
          
            $table->string('msimamizi_ubatizo');

            $table->date('komunyo_ya_kwanza');
            $table->date('komunyo_parish');

            $table->date('kipaimara');
            $table->integer('no_kipaimara');
            $table->string('parokia_kipaimara');


            $table->date('tarehe_ndoa');
            $table->string('partiner');
            $table->integer('no_ndoa');
            $table->string('parokia_ndoa');


            $table->unsignedInteger('familia_id');




            $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade');


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
        Schema::dropIfExists('members');
    }
}