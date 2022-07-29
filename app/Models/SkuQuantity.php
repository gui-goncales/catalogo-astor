<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuQuantity extends Model
{
    protected $primaryKey = 'Sku';
    protected $table = "sku_quantity_spot";
    use HasFactory;
}
