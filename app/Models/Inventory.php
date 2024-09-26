<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'stores_schema.inventory';
    protected $primaryKey = 'store_uid';
    protected $keyType = 'bigint';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'store_uid',
        'product_uid',
        'quantity'
    ];


}
