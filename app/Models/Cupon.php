<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;


    use HasFactory;
    protected $guarded = [];

    public function creator(){
        return $this->hasOne(User::class, 'id', 'cupon_id');
    }
}
