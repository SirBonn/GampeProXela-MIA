<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'stores_schema.products';
    protected $primaryKey = 'uid';

    protected $fillable = [
        'uid',
        'name',
        'description',
        'quantity',
        'cost',
        'public_price'
    ];

    public function getType()
    {
        return 'product';
    }

    public static function topSellingProducts($limit = 10)
    {
        $ps = Product::hydrate(DB::table('stores_schema.products as p')
            ->join('sales_schema.product_list as pl', 'p.uid', '=', 'pl.product_uid')
            ->select('p.uid', 'p.name', DB::raw('SUM(pl.quantity) AS total_sold'), 'p.public_price', 'p.description', 'p.quantity')
            ->groupBy('p.uid', 'p.name')
            ->orderBy('total_sold', 'DESC')
            ->limit($limit)
            ->get()->toArray());
        return $ps;
    }

    // public function stores()
    // {
    //     return $this->belongsToMany(Store::class, 'stores_schema.inventory', 'product_uid', 'store_uid')->withPivot('quantity');
    // }

    // public function sales()
    // {
    //     return $this->belongsToMany(Sale::class, 'stores_schema.product_list', 'product_uid', 'sale_uid')->withPivot('quantity', 'subtotal');
    // }
}
