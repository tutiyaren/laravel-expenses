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

    public function scopeIncomeSourceSearch($query, $income_source_id)
    {
        if(!empty($income_source_id)) {
            return $query->where('income_source_id', $income_source_id);
        }
        return $query;
    }

    public function scopeDateSearch($query, $startDate, $endDate)
    {
        if (!empty($startDate) && !empty($endDate)) {
            return $query->whereBetween('accrual_date', [$startDate, $endDate]);
        }
        return $query;
    }

    public static function getYearlyData()
    {
        return static::selectRaw('YEAR(accrual_date) as year, MONTH(accrual_date) as month, SUM(amount) as total')
            ->groupBy('year', 'month')
            ->get();
    }
}
