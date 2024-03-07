<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PestInfo extends Model
{
  use HasFactory;

  public $fillable = [
    'pest_id',
    'description',
    'habits_and_damage',
    'management',
    'image_1',
    'image_2',
    'image_3',
  ];
}
