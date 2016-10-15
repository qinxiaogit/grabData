<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Services\TaskService;
use App\Task;
use Illuminate\Http\Response;

class TasksController extends Controller
{
    /** @var TaskService */
    private $taskService;

    /**
     * TasksController constructor.
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['tasks'] = $this->taskService->index();

        return view('tasks', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTaskRequest $request
     * @return Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request['name'];

        $this->taskService->store($task);

        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $task = new Task();
        $task->id = $id;

        $this->taskService->destroy($task);

        return redirect('/todo');
    }
}
