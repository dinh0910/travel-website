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
      $table->json('place');
      $table->json('journey');
      $table->string('departure');
      $table->string('vehicle');
      $table->integer('price');
      $table->integer('sale');
      $table->integer('sale_price');
      $table->tinyInteger('active')->default(1);
      $table->json('special');
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
