<?php

namespace App;

use App\TaskUser;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany("App\User")->withTimestamps()->withPivot(['priority', 'process_at', 'done_at']);
    }

    
}
