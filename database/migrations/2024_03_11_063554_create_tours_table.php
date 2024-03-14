<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tours', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedBigInteger('place_id');
      $table->foreign('place_id')->references('id')->on('places');
      $table->unsignedBigInteger('journey_id');
      $table->foreign('journey_id')->references('id')->on('journeys');
      $table->string('departure');
      $table->string('vehicle');
      $table->integer('price');
      $table->integer('sale');
      $table->integer('sale_price');
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
    Schema::dropIfExists('tours');
  }
}
