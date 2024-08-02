<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public $table = "inventory";
    protected $fillable = ['InventoryName'];
    public $timestamps = false;
    protected $primaryKey = 'InventoryID';
}
