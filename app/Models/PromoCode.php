<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PromoCode extends Model
{
    use HasFactory;
    public function merchantList(): HasMany
    {
        return $this->hasMany(MerchantUser::class, 'user_id', 'user_id');
    }
}
