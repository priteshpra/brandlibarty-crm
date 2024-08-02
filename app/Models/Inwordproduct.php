<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inwordproduct extends Model
{
    use HasFactory;
    public $table = "inwordproducts";
    public $timestamps = false;
    protected $primaryKey = 'InwordproductID';
}
