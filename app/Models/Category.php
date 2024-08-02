<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = "categorys";
    protected $fillable = ['categoryName'];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
