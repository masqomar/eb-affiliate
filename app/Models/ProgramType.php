<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramType extends Model
{
    use HasFactory, Uuid;    
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'program_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'category_id'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['name' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    
	
	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }

    public function programs()
	{
		return $this->hasMany(\App\Models\Program::class);
    }
}
