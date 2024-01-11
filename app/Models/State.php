<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Country
};

class State extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'states';

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
