<?php

namespace App\Models;

use App\Traits\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'exam_id', 'code', 'voucher_activated', 'voucher_used', 'total_purchases', 'maximum_payment_time', 'transaction_status', 'voucher_token', 'invoice', 'program_id', 'snap_token', 'program_date', 'program_time', 'note', 'discount', 'admin_fee', 'down_payment', 'period'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['code' => 'string', 'total_purchases' => 'double', 'maximum_payment_time' => 'datetime:d/m/Y H:i', 'voucher_token' => 'string', 'invoice' => 'string', 'snap_token' => 'string', 'program_date' => 'date:d/m/Y', 'program_time' => 'datetime:H:i', 'discount' => 'integer', 'admin_fee' => 'integer', 'down_payment' => 'integer', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i', 'period' => 'string'];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function exam()
    {
        return $this->belongsTo(\App\Models\Exam::class);
    }
    public function program()
    {
        return $this->belongsTo(\App\Models\Program::class);
    }

    public static function generateCode()
    {
        $code = 'INV';
        $sequence = 1;
        $format = formatCode($code, $sequence);
        $result = null;

        while (true) {
            $query = static::where('code', $format)->first();
            if (empty($query)) {
                $result = $format;
                break;
            }
            $format = formatCode($code, ++$sequence);
        }

        return $result;
    }

    public function getDateAttribute($value)
    {
        return dateFormat($value, 'd F Y');
    }

    public function getVoucherExpiredDateAttribute($value)
    {
        return empty($value) ? '-' : dateFormat($value, 'd F Y');
    }

    public function getMaximumPaymentTimeAttribute($value)
    {
        return dateFormat($value, 'd F Y H:i');
    }

    public function getCreatedAtAttribute($value)
    {
        return dateFormat($value, 'd F Y H:i');
    }

    public function getIsExpiredAttribute()
    {
        return $this->attributes['voucher_expired_date'] < Carbon::now() ? true : false; 
    }
}
