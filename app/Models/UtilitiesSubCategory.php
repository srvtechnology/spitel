<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	UtilitiesCategory
};

class UtilitiesSubCategory extends Model
{
    use HasFactory;
    protected $table = 'utilities_sub_category';

    public function category()
    {
    	return $this->belongsTo(UtilitiesCategory::class, 'parent_id', 'id');
    }
}
