<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $table = "orders";
    protected $fillable = ['UserID'];
    public $timestamps = false;
    protected $primaryKey = 'OrderID';
}
