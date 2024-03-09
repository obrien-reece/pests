<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PestInfo extends Model
{
  use HasFactory;

  public $table = 'pest_info';

  public $fillable = [
    'pest_id',
    'description',
    'image_1',
    'image_2',
    'image_3',
  ];

  public function pest(): BelongsTo {
    return $this->belongsTo(Pest::class);
  }

}
