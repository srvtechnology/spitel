<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Customer,
	City,
	Slide
};

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisement';

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function city()
    {
    	return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function Slide()
    {
    	return $this->belongsTo(Slide::class, 'slide_id', 'id');
    }
}
