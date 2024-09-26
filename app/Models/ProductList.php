<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;

    protected $table = 'store_schema.product_list';

    protected $fillable = [
        'sale_uid',
        'product_uid',
        'quantity',
        'subtotal'
    ];

}
