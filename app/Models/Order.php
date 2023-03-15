<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email','home_phone_number','cell_phone','address','status','how_did_hear','total_amount','transaction_id'
    ];
    public function extraorder()
    {
        return $this->hasMany(OrderExtra::class,'order_id','id');
    }
    public function serviceorder()
    {
        return $this->hasMany(OrderService::class,'order_id','id');
    }
}
