<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    public $table = "customerpayment";
    public $timestamps = false;
    protected $primaryKey = 'CustomerPaymentID';
}
