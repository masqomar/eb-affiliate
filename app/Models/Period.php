<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periods';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['period_date', 'is_active', 'category_id'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['period_date' => 'date:d/m/Y', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];


    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function programs()
    {
        return $this->belongsToMany(\App\Models\Program::class);
    }

    public function getPeriodDateAttribute()
    {
        return Carbon::parse($this->attributes['period_date'])
            ->translatedFormat('d F Y');
    }
}
