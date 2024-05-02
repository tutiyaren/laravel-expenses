<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'income_source_id',
        'amount',
        'accrual_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function income_source()
    {
        return $this->belongsTo(Income_source::class);
    }
}
