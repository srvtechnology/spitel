<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessType extends Model
{
    use HasFactory;

    public function businessProductCategory()
    {
        return $this->hasMany(BusinessProductCategory::class, 'business_type_id', 'id')->where('status', 1);
    }
}
