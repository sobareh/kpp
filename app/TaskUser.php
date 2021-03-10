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

    public function scopeuserId($query, $id)
    {
        return $query->where('user_id', '=',$id);
    }

    public function scopePriority($query, $prior)
    {
        return $query->where('priority', $prior);
    }

    public function scopeUpdateTaskItem($query, $taskId, $userId, $prior) {
        return $query->where([
            ['task_id', $taskId],
            ['user_id', $userId],
            ['priority', $prior],
        ]);
    }
}
