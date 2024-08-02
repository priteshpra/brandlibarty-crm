<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    public $table = "settings";
    protected $fillable = ['apiTitle', 'apikey', 'secretKey', 'apiDocLink'];
    public $timestamps = false;
    protected $primaryKey = 'SettingID';
}
