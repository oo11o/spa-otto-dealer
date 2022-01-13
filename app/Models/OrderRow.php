<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRow extends Model
{
    use HasFactory;

    protected $table = 'tetra_order_row';
    protected $primaryKey = null;
}
