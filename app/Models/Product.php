<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'pro_cate_id', 'pro_cate_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function creator(){
        return $this->hasOne(User::class, 'id', 'product_id');
    }
    public function editor(){
        return $this->hasOne(User::class, 'id', 'product_id');
    }
}