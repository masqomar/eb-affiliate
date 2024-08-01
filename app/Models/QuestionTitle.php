<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTitle extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_titles';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_id', 'name', 'total_choices', 'total_section', 'add_value_category', 'assessment_type', 'show_answer', 'minimum_grade'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['name' => 'string', 'total_choices' => 'integer', 'total_section' => 'integer', 'minimum_grade' => 'double', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }
}
