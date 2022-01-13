<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';


    public function orders()
    {
        return $this->hasManyThrough(
            OrderRow::class,
            Order::class,
            'customer_id', // Foreign key on  Order table...customer_id
            'order_id', // Foreign key on the OrderRow table...
            'id_tetra', // Local key on the Customer table...
            'tetra_order_id' // Local key on the  table...
        );
    }

    public function onlys()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id_tetra');
    }
}
