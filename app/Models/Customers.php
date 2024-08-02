<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public $table = "admindetails";
    protected $fillable = ['FirstName', 'LastName', 'EmailID', 'Password', 'MobileNo', 'BirthDate', 'City', 'State', 'Country', 'Gender'];
    public $timestamps = false;
    protected $primaryKey = 'UserID';
}
