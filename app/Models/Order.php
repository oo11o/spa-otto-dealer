<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tetra_order';
    protected $primaryKey = 'tetra_order_id';


    public function order_row()
    {
        return $this->hasMany(OrderRow::class, 'order_id');
    }

}
