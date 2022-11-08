<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function product(Type $var = null)
    {
        return $this->belongsTo(Product::class ,'products_id');
    }
}
