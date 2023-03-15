<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'account_id', 'date', 'value'
    ];
    public function users() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function accounts() {
        return $this->belongsTo(Account::class,'account_id','id');
    }

}
