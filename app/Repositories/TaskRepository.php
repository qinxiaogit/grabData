<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    /**
     * @return Collection
     */
    public function index() : Collection
    {
        return Task::orderBy('created_at', 'asc')
            ->get();
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function store(Task $task) : Task
    {
        $task->save();

        return $task;
    }

    /**
     * @param Task $task
     */
    public function destroy(Task $task)
    {
        Task::findOrFail($task->id)
            ->delete();
    }
}