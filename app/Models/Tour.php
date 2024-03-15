<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'place_id',
      'journey', 'departure', 'vehicle', 'price', 'sale', 'sale_price'
    ];
}
