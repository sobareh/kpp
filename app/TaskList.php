<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{

    protected $table = 'tasklists';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
