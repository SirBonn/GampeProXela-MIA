<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'customers_schema.cards';
    protected $primaryKey = 'uid';


    protected $fillable = ['customer_nit', 'activation_date', 'member_grade'];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_nit', 'nit');
    }


    public function membership()
    {
        return $this->belongsTo(Membership::class, 'member_grade', 'uid');
    }
}
