<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRoomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('list_rooms', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('hotel_id');
      $table->string('name');
      $table->text('description');
      $table->tinyInteger('size');
      $table->tinyInteger('number');
      $table->tinyInteger('double_bed');
      $table->tinyInteger('wifi');
      $table->tinyInteger('shower');
      $table->tinyInteger('air_conditional');
      $table->integer('price');
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
    Schema::dropIfExists('list_rooms');
  }
}
