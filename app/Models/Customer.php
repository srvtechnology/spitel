<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    State,
    City,
    Surname,
    Panth,
    Patti,
    BloodGroup,
    BusinessCategory
};
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function native_state()
    {
        return $this->belongsTo(State::class, 'native_state_id', 'id');
    }

    public function business_state()
    {
        return $this->belongsTo(State::class, 'business_state_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function native_city()
    {
        return $this->belongsTo(City::class, 'native_city_id', 'id');
    }

    public function business_city()
    {
        return $this->belongsTo(City::class, 'business_city_id', 'id');
    }

    public function surname()
    {
        return $this->belongsTo(Surname::class, 'surname_id', 'id');
    }

    public function sasural_surname()
    {
        return $this->belongsTo(Surname::class, 'sasural_surname_id', 'id');
    }

    public function panth()
    {
        return $this->belongsTo(Panth::class, 'panth_id', 'id');
    }

    public function patti()
    {
        return $this->belongsTo(Patti::class, 'patti_id', 'id');
    }

    public function blood_group()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id', 'id');
    }

    public function business_category()
    {
        return $this->belongsTo(BusinessCategory::class, 'business_category_id', 'id');
    }
	
	public function family_members()
    {
        return $this->hasMany(FamilyMember::class, 'cust_id', 'id');
    }
	
	public function surname_gautra()
    {
        return $this->hasOne(Surname::class, 'id', 'surname_id');
    }
}
