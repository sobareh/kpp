<?php

namespace App;

use App\TaskUser;
use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'tasks';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany("App\User")->withTimestamps()->withPivot(['task_id','user_id','priority', 'process_at', 'done_at']);
    }

    public static function diffInDaysFilter($timeNow) {
        $data = now()->diffInDaysFiltered(function(Carbon $date) {
            return !$date->isWeekend();
        }, $timeNow, false);

        $retVal = ($data > 0) ? $data . " Hari lagi" : ( $data < 0 ? 'Lewat ' . $data . ' hari' : "Hari ini" );
        
        return $retVal;
    }

    
}
