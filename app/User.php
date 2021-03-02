<?php

namespace App;

use App\TaskUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'position', 'role_id'
    ];

    public function tasks()
    {
        return $this->belongsToMany("App\Task");
    }

    
}