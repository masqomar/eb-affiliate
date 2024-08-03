<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  use HasFactory, Uuid;
  public $incrementing = false;
  protected $keyType = 'string';

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'programs';

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = ['name', 'price', 'image', 'is_active', 'program_type_id'];

  /**
   * The attributes that should be cast.
   *
   * @var string[]
   */
  protected $casts = ['name' => 'string', 'price' => 'integer', 'image' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];


  public function period()
  {
    return $this->belongsTo(\App\Models\Period::class);
  }

  public function program_type()
  {
    return $this->belongsTo(\App\Models\ProgramType::class);
  }

  public function periods()
  {
    return $this->belongsToMany(\App\Models\Period::class);
  }
}
