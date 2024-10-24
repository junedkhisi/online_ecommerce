<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_id', 'product_id', 'qty',
    ];

    public function header() {
        return $this->belongsTo(Header::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
