<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Customer,
	UtilitiesCategory,
	UtilitiesSubCategory,
	Country,
	State,
	City
};

class Utilites extends Model
{
    use HasFactory;
    protected $table = 'utilites';

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function category()
    {
    	return $this->belongsTo(UtilitiesCategory::class, 'category_id', 'id');
    }

    public function sub_category($value='')
    {
    	return $this->belongsTo(UtilitiesSubCategory::class, 'sub_category_id', 'id');
    }

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state()
    {
    	return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city()
    {
    	return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
