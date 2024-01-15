<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    NewsCategory,
    NewsSubCategory,
    Customer,
    City
};

class News extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(NewsSubCategory::class, 'sub_category_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
