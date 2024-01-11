<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Customer,
	City,
	State
};

class Matrimony extends Model
{
    use HasFactory;
    protected $table = 'matrimony';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function city()
    {
    	return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function state()
    {
    	return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
