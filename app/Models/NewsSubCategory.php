<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsCategory;

class NewsSubCategory extends Model
{
    use HasFactory;
    protected $table = 'news_sub_category';

    public function news_category()
    {
        return $this->belongsTo(NewsCategory::class, 'parent_category_id', 'id');
    }
}
