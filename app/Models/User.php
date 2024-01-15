<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'user_type',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function representativeList()
    {
        return $this->hasOne(RepresentativeUser::class, 'user_id', 'id');
    }

    public function merchant()
    {
        return $this->hasOne(MerchantUser::class, 'user_id');
    }

    public function representative()
    {
        return $this->hasOne(RepresentativeUser::class, 'user_id');
    }
    public function businessProductCategories()
    {
        return $this->hasMany(MerchantProductCategory::class, 'user_id', 'id');
    }
    public function merchantList(): HasMany
    {
        return $this->hasMany(MerchantUser::class, 'user_id', 'id');
    }
    public function merchantCategoryList(): HasMany
    {
        return $this->hasMany(MerchantProductCategory::class, 'user_id', 'id');
    }
}
