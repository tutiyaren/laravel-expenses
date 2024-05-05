<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Spending\Id;
use App\Domain\ValueObject\Spending\UserId;
use App\Domain\ValueObject\Spending\CategoryId;
use App\Domain\ValueObject\Spending\Name;
use App\Domain\ValueObject\Spending\Amount;
use App\Domain\ValueObject\Spending\Accrual_date;

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

    public static function getYearlyData($userId)
    {
        return static::where('user_id', $userId)
            ->selectRaw('YEAR(accrual_date) as year, MONTH(accrual_date) as month, SUM(amount) as total')
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
    // categoryId
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = new CategoryId($value);
    }
    public function getCategoryIdAttribute($value)
    {
        return $value instanceof CategoryId ? $value->value() : $value;
    }
    // name
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = new Name($value);
    }
    public function getNameAttribute($value)
    {
        return $value instanceof Name ? $value->value() : $value;
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
