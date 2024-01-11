<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Engagement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bride_cur_city()
    {
        return $this->belongsTo(City::class,'bride_current_city');
    }

    public function bride_nat_city()
    {
        return $this->belongsTo(City::class,'bride_native_city');
    }

    public function groom_cur_city()
    {
        return $this->belongsTo(City::class,'groom_current_city');
    }

    public function groom_nat_city()
    {
        return $this->belongsTo(City::class,'groom_native_city');
    }
}
