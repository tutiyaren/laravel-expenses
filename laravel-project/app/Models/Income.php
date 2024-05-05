<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Income\Id;
use App\Domain\ValueObject\Income\UserId;
use App\Domain\ValueObject\Income\Income_sourceId;
use App\Domain\ValueObject\Income\Amount;
use App\Domain\ValueObject\Income\Accrual_date;

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

    // id
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = new Id($value);
    }
    public function getIdAttribute($value)
    {
        return $value instanceof Id ? $value->value() : $value;
    }
    // userId
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = new UserId($value);
    }
    public function getUserIdAttribute($value)
    {
        return $value instanceof UserId ? $value->value() : $value;
    }
    // income_sourceId
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['income_source_id'] = new Income_sourceId($value);
    }
    public function getCategoryIdAttribute($value)
    {
        return $value instanceof Income_sourceId ? $value->value() : $value;
    }
    // amount
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = new Amount($value);
    }
    public function getAmountAttribute($value)
    {
        return $value instanceof Amount ? $value->value() : $value;
    }
    // accrual_date
    public function setAccrual_dateAttribute($value)
    {
        $this->attributes['accrual_date'] = new Accrual_date($value);
    }
    public function getAccrual_dateAttribute($value)
    {
        return $value instanceof Accrual_date ? $value->value() : $value;
    }
}
