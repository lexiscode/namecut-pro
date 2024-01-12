<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','firstname','surname',
        'phone_no', 'affidavit', 'certificate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
