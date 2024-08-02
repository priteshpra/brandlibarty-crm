<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $table = "cities";
    protected $fillable = ['CityName'];
    public $timestamps = false;
    protected $primaryKey = 'CityID';
}
