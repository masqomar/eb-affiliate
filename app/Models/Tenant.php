<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;

    protected $fillable = [
        'user_id',
        'subdomain',
        'subdomain_link',
        'account_bank',
        'account_number',
        'account_name',
        'phone_number',
        'address',
        'snk'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'aff_id', 'id');
    }
}
