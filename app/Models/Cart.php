<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'image', 'name', 'qty', 'price', 'subtotal',
    ];

    protected $table = 'carts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }

}
