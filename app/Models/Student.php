<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, Uuid;
    public $incrementing = false;
    protected $keyType = 'string';
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'province_id', 'city_id', 'district_id', 'village_id', 'address', 'phone_number', 'gender', 'is_member', 'member_access'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['address' => 'string', 'phone_number' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
    }
}
