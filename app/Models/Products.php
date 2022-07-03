<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';

    protected $fillable = [
        'supplier_code',
        'category_code',
        'product_code',
        'product_name'
    ];
}
