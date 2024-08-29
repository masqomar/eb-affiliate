<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['tenant_id', 'amount', 'commission_proof', 'note'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['commission_proof' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function tenant()
	{
		return $this->belongsTo(\App\Models\Tenant::class);
    }
}
