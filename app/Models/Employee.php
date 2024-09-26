<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'sales_schema.employees';
    protected $primaryKey = 'user_dpi';


    protected $fillable = [
        'user_dpi',
        'name',
        'forename',
        'birthday',
        'store_employe'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_dpi', 'dpi');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_employe', 'uid');
    }

    public function getType()
    {
        $type = 'employee';
        return $type;
    }
}
