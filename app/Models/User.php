<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'sales_schema.users';
    protected $primaryKey = 'dpi';
    protected $keyType = 'bigint';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'dpi',
        'username',
        'password',
        'rol'
    ];

    public function getType(){
        return 'user';
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_dpi', 'dpi');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_dpi', 'dpi');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'rol', 'uid');
    }
}
