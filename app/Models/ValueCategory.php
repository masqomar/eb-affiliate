<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueCategory extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'value_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_id', 'name', 'assessment_type', 'section'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['name' => 'string', 'section' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }
}
