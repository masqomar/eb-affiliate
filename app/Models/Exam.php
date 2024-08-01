<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exams';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_id', 'question_title_id', 'title', 'price', 'duration_type', 'duration', 'description', 'random_question', 'random_answer', 'show_answer', 'show_question_number_navigation', 'show_question_number', 'next_question_automatically', 'show_prev_next_button', 'type_option', 'total_tolerance'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['title' => 'string', 'price' => 'double', 'duration_type' => 'integer', 'duration' => 'integer', 'description' => 'string', 'total_tolerance' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }	
	public function question_title()
	{
		return $this->belongsTo(\App\Models\QuestionTitle::class);
    }
}
