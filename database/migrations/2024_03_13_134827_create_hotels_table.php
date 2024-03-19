<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('hotels', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('type_hotel_id');
      $table->bigInteger('place_id');
      $table->string('name');
      $table->tinyInteger('view_sea')->default(1);
      $table->tinyInteger('restaurant_coffee')->default(1);
      $table->tinyInteger('wifi')->default(1);
      $table->tinyInteger('air_conditional')->default(1);
      $table->integer('price');
      $table->tinyInteger('active')->default(1);
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
    Schema::dropIfExists('hotels');
  }
}
