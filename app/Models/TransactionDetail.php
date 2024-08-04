<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['transaction_id', 'invoice', 'tshirt_size', 'full_payment', 'snap_token', 'payment_status'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['invoice' => 'string', 'tshirt_size' => 'string', 'full_payment' => 'integer', 'snap_token' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];


    public function transaction()
    {
        return $this->belongsTo(\App\Models\Transaction::class);
    }
}
