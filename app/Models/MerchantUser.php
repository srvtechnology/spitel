<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MerchantUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_name',
        'business_type_id',
        'contact_number',
        'contact_address',
        'lat',
        'long',
        'contact_email',
        'director_name',
        'director_mob_no',
        'license_no',
        'commercial_reg_no',
        'representative_referral_code',
        'tax_no',
        'referral_user_id',
        'user_id',
        'tax_certificate',
        'commercial_certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function representative()
    {
        return $this->belongsTo(RepresentativeUser::class, 'referral_user_id', 'user_id');
    }

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }

    public function merchantProductCategories()
    {
        return $this->hasMany(MerchantProductCategory::class, 'user_id', 'user_id');
    }

    public function userList(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function merchantProductCategory(): BelongsTo
    {
        return $this->belongsTo(MerchantProductCategory::class, 'user_id', 'user_id')->where('status', 1);
    }

    public function favourite(): BelongsTo
    {
        return $this->belongsTo(Favourite::class, 'user_id', 'user_id');
    }

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'user_id', 'user_id')->where('type', 1);
    }

    public function Discount(): BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'user_id', 'user_id')->where('status', 1);
    }

    public function bussinessCategory(): BelongsTo
    {
        return $this->belongsTo(BusinessProductCategory::class, 'user_id', 'user_id')->where('status', 1);
    }
}
