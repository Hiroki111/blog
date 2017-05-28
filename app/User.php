<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $table    = 'users';
    protected $fillable = ['name', 'email'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden   = ['password', 'remember_token'];
    public $timestamps  = true;

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
