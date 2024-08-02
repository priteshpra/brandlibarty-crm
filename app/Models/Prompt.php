<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    use HasFactory;

    public $table = "prompts";
    protected $fillable = [
        'prompt',
        'language',
        'tone_of_voice',
        'act_as',
        'character',
        'description',
    ];
}
