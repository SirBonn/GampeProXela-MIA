<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = ' customers_schema.cards';
    protected $primaryKey = 'uid';

    protected $fillable = ['name', 'off_percent'];

    public function cards()
    {
        return $this->hasMany(Card::class, 'member_grade', 'uid');
    }
}
