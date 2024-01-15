<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Customer
};

class Anniversary extends Model
{
    use HasFactory;
    protected $table = 'anniversary';

    public function customer()
    {
    	return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
}
