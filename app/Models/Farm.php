<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Farm extends Model
{
  use HasFactory;

  public $table = 'farm';

  public $fillable = [
    'farmer_id',
    'farm_size',
    'farm_name',
    'farm_location',
    'crop_name',
    'pest_frequency',
    'pest',
    'crop_names',
    'production_years',
    'farming_type',
  ];

  public function farmer() :BelongsTo {
    return $this->belongsTo(User::class, 'id');
  }
}
