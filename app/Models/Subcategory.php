<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    public $table = "subcategory";
    protected $fillable = ['SubCategoryName'];
    public $timestamps = false;
    protected $primaryKey = 'SubCategoryID ';
}
