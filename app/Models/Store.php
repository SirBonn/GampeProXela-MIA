<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores_schema.stores';
    protected $primaryKey = 'uid';

    protected $fillable = [
        'uid',
        'name',
        'phone',
        'address'
    ];

    public function getType()
    {
        return 'store';
    }


    public function getEmployees($storeId)
    {
        $employees = DB::table('stores_schema.employees')
            ->where('store_uid', $storeId)
            ->get();

        return $employees;
    }

    public function getProducts($storeId)
    {
        $products = DB::table('stores_schema.inventory')
            ->join('stores_schema.products', 'stores_schema.inventory.product_uid', '=', 'stores_schema.products.uid')
            ->where('stores_schema.inventory.store_uid', $storeId)
            ->select('stores_schema.products.*', 'stores_schema.inventory.quantity')
            ->get();

        return $products;
    }


    public function ledgeProducts($storeId)
    {
        $products = DB::table('stores_schema.inventory')
            ->join('stores_schema.products', 'stores_schema.inventory.product_uid', '=', 'stores_schema.products.uid')
            ->where('stores_schema.inventory.store_uid', $storeId)
            ->select('stores_schema.products.*', 'stores_schema.inventory.quantity')
            ->get();

        return $products;
    }
}
