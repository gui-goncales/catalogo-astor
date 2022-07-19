<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoSpot extends Model
{
    protected $primaryKey = 'ProdReference';
    protected $table = "produto_spot";
    use HasFactory;
}
