<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $table = 'task_user';

    public function scopetaskId($query, $taskId)
    {
        return $query->where('task_id', $taskId)->exists();
    }

    public function scopeUpdateTaskItem($query, $taskId, $userId, $prior) {
        return $query->where([
            ['task_id', $taskId],
            ['user_id', $userId],
            ['priority', $prior],
        ]);
    }
}
