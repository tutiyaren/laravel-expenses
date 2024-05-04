<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'amount',
        'accrual_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilterByCategoryAndDate($query, $userId, $categoryId, $startDate, $endDate)
    {
        $query->where('user_id', $userId);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('accrual_date', [$startDate, $endDate]);
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
