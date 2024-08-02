<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productattributes extends Model
{
    use HasFactory;
    public $table = "productattributes";
    protected $fillable = ['AttributeTitle', 'CategoryID', 'SubCategoryID', 'ProductID', 'Amount'];
    public $timestamps = false;
    protected $primaryKey = 'AttributeID';
}
