<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['code', 'amount', 'qty', 'program_id', 'start_date', 'end_date'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['code' => 'string', 'amount' => 'integer', 'qty' => 'integer', 'start_date' => 'date:d/m/Y', 'end_date' => 'date:d/m/Y', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    
	
	public function program()
	{
		return $this->belongsTo(\App\Models\Program::class);
    }
}
