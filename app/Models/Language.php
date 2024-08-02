<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $table = "language";
    protected $fillable = ['LanguageName'];
    public $timestamps = false;
    protected $primaryKey = 'LanguageID';
}
