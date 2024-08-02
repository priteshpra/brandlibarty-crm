<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $table = "roles";
    protected $primaryKey = 'RoleID';

    protected $fillable = [
        'RoleName',
        'Description',
    ];


    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions',  'role_id', 'permission_id');
    }


    static function boot()
    {

        parent::boot();

        static::deleting(function (Model $model) {
            User::where('role', $model->id)->update(['role' => null]);
        });
    }
}
