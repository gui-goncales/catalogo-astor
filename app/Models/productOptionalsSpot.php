<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productOptionalsSpot extends Model
{
    protected $primaryKey = 'ProdReference';
    protected $table = "product_optionals_spot";
    use HasFactory;
}
