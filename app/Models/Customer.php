<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers_schema.customers';
    protected $primaryKey = 'nit';
    protected $keyType = 'bigint';
    public $timestamps = false;
    public $incrementing = false;


    protected $fillable = [
        'nit',
        'name',
        'address',
        'dpi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'dpi', 'dpi');
    }

    public function Card()
    {
        return $this->hasOne(Card::class, 'customer_nit', 'nit');
    }

    public function getType(){
        return 'customer';
    }

    public static function topSpendingCustomers($limit = 10)
    {
         $cs = Customer::hydrate(DB::table('customers_schema.customers as c')
            ->join('sales_schema.sales as s', 'c.nit', '=', 's.customer_nit')
            ->select('c.nit', 'c.name', DB::raw('SUM(s.total) AS total_spent'), 'c.address', 'c.dpi', 'c.uid')
            ->groupBy('c.nit', 'c.name')
            ->orderBy('total_spent', 'DESC')
            ->limit($limit)
            ->get()->toArray());

            return $cs;
    }

}
