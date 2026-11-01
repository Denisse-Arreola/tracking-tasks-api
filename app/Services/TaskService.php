<?php

namespace App\Services;

use App\Http\Requests\Tasks\TaskCreateRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskResponsible;

class TaskService {
    public function getAll(): array 
    {
        $tasks = Task::with(['responsible_users'])->get()->toArray();
        return $tasks;
    }

    public function find(int $task_id): Task 
    {
        $task = Task::with(['responsible_users'])->findOrFail($task_id);
        return $task;
    }

    public function store(TaskCreateRequest $request): Task
    {
        $task = Task::create($request->validated());

        // verify responsibles
        foreach ($request->input('responsible_users', []) as $user) {
            TaskResponsible::create([ 
                'task_id' => $task->id, 
                'user_id' => $user['id']
            ]);
        }

        $task->load('responsible_users');
        return $task;
    }

    public function update(Request $request, int $task_id): Task
    {
        $task = $this->find($task_id);
        $task->update($request->toArray());
        return $task;
    }

    public function destroy(int $task_id)
    {
        $task = $this->find($task_id);
        $task->delete();
    }
}