<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MerchantProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_product_category_id',
        'user_id',
    ];

    public function businessProductCategories()
    {
        return $this->belongsTo(BusinessProductCategory::class, 'business_product_category_id', 'id');
    }

    public function User(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function merchant(): HasMany
    {
        return $this->hasMany(MerchantUser::class);
    }

    public function businessProductCategory()
    {
        return $this->hasMany(BusinessProductCategory::class, 'business_type_id', 'id');
    }
}
