<?php

namespace App;

use App\TaskUser;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'tasks';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany("App\User")->withTimestamps()->withPivot(['priority', 'process_at', 'done_at']);
    }

    
}
