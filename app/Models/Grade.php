<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_id', 'exam_id', 'user_id', 'duration', 'number', 'section', 'total_section', 'start_time', 'end_time', 'total_correct', 'grade_old', 'grade', 'answers', 'is_finished', 'total_tolerance', 'is_blocked'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['duration' => 'integer', 'number' => 'integer', 'section' => 'integer', 'total_section' => 'integer', 'start_time' => 'datetime:d/m/Y H:i', 'end_time' => 'datetime:d/m/Y H:i', 'total_correct' => 'integer', 'is_finished' => 'integer', 'total_tolerance' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
    }	
	public function exam()
	{
		return $this->belongsTo(\App\Models\Exam::class);
    }	
	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
    }
}
