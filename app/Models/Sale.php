<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales_schema.sales';
    protected $primaryKey = 'uid';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'uid',
        'customer_nit',
        'store_uid',
        'employee_dpi',
        'total',
        'sale_date'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_nit', 'nit');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_uid', 'uid');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_dpi', 'user_dpi');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sales_schema.product_list', 'uid', 'sale_uid')->withPivot('quantity', 'subtotal');
    }


}
