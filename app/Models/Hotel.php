<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'wifi',
    'restaurant_coffee',
    'view_sea',
    'air_conditional',
    'price',
    'type_hotel_id', 'place_id'
  ];
}
