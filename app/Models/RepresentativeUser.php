<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentativeUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'id_number',
        'city_id',
        'neighborhood',
        'neighborhood_1',
        'other_doc',
        'img',
        'id_upload',
        'reference_code',
        'user_id',
    ];

   public function userList()
   {
    return $this->belongsTo(User::class,'user_id','id');
   }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
