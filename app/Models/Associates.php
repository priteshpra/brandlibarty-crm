<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associates extends Model
{
    use HasFactory;
    public $table = "associates";
    protected $fillable = ['ContactPersonName'];
    public $timestamps = false;
    protected $primaryKey = 'AssociateID';
}
