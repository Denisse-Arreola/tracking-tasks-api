<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable([
    'name',
    'description',
    'status',
    'priority',
    'expected_at',
    'due_at'
])]
#[Table('tasks')]
class Task extends Model
{
    use HasFactory;

    // statuses
    const BACKLOG_STATUS = 'backlog';
    const PENDING_STATUS = 'pending';
    const IN_PROCESS_STATUS = 'in_process';
    const COMPLETED_STATUS = 'completed';
    const CLOSED_STATUS = 'closed';
    const CANCELED_STATUS = 'canceled';

    // priority
    const UNDEFINED_PRIORITY = 'undefined';
    const LOW_PRIORITY = 'low';
    const MEDIUM_PRIORITY = 'medium';
    const HIGH_PRIORITY = 'high';

    public function responsible_users()
    {
        return $this->belongsToMany(User::class, 'task_responsible_users', 'task_id', 'user_id', 'id', 'id');
    }
}
