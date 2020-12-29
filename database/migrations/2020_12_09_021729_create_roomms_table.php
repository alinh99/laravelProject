<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoommsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomms', function (Blueprint $table) {
            $table -> integer('id');
            $table -> string('name')->unique;
            $table -> string('image');
            $table -> longText('id_type');
            $table -> integer('price');
            $table -> integer('number');
            $table -> string('area');
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
        Schema::dropIfExists('roomms');
    }
}
