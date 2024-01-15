<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_arabic', 'business_type_id', 'image', 'created_by', 'status'];

    public function businessType()
    {
        return $this->belongsTo(businessType::class);
    }

    public function merchantList()
    {
        return $this->hasMany(MerchantUser::class, 'user_id', 'user_id');
    }
}
