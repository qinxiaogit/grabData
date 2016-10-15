<?php

declare(strict_types = 1);

namespace App\Services;

use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    /** @var TaskRepository */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return Collection
     */
    public function index() : Collection
    {
        return $this->taskRepository->index();
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function store(Task $task)
    {
        $this->taskRepository->store($task);
    }

    /**
     * @param Task $task
     */
    public function destroy(Task $task)
    {
        $this->taskRepository->destroy($task);
    }
}