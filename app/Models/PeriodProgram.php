<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodProgram extends Model
{
    use HasFactory;
    protected $table = 'period_program';

    public function programs()
    {
        return $this->belongsToMany(\App\Models\Program::class);
    }

    public function periods()
    {
        return $this->belongsToMany(\App\Models\Period::class);
    }
}
