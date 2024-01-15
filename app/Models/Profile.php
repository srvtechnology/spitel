<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
