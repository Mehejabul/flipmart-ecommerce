<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];

    public function cat_parent(){
        return $this->belongsTo(ProductCategory::class, 'pro_cate_parent', 'pro_cate_id');
    }
}
