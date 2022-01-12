<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetraCustomer extends Model
{
    use HasFactory;

    protected $table = 'tetra_customer';
    protected $primaryKey = 'id_tetra';
    protected $keyType = 'string';
}
