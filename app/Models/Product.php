<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'image', 'description', 'price', 'discount',  'total_price','stock'
    ];

    protected $table = 'products';

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function detail() {
        return $this->hasMany(Detail::class);
    }
}
