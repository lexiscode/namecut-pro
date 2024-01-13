<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id', 'payment_id', 'product_name',
        'amount', 'payment method',
        'payment_status', 'verification'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
