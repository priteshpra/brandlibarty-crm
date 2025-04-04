<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSettings extends Model
{
    use HasFactory;
    public $table = "emailsetting";
    protected $fillable = ['EmailFrom'];
    public $timestamps = false;
    protected $primaryKey = 'EmailID';
}
