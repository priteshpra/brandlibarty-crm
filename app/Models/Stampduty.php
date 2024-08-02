<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stampduty extends Model
{
    use HasFactory;
    public $table = "stampduty";
    protected $fillable = ['StampDutyTitle'];
    public $timestamps = false;
    protected $primaryKey = 'StampDutyID';
}
