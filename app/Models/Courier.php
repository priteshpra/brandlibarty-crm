<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    public $table = "courier";
    protected $fillable = ['CourierName'];
    public $timestamps = false;
    protected $primaryKey = 'CourierID';
}
