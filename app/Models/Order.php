<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);

    }//end of user

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
}
