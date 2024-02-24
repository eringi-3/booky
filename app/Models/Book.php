<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'purchase_price', 'selling_price'];
    protected $dates = ['purchase_date'];

    public function getTotalPurchasePrice()
    {
        // 各本の買った値段を合計
        return self::sum('purchase_price');
    }

    public function getTotalSellingPrice()
    {
        // 各本の売れた値段を合計
        return self::sum('selling_price');
    }

    public function getDifference()
    {
        // 差額
        return $this->sum('selling_price') - $this->sum('purchase_price');
    }

}
