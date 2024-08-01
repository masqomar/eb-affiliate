<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailValueCategory extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_value_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['value_category_id', 'min_grade', 'max_grade', 'final_grade'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['min_grade' => 'double', 'max_grade' => 'double', 'final_grade' => 'double', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function value_category()
	{
		return $this->belongsTo(\App\Models\ValueCategory::class);
    }
}
