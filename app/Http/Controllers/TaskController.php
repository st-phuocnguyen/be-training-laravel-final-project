<?php

namespace App\Http\Controllers;

use App\Repositories\Task\TaskRepository;
use App\Http\Requests\Task\ShowTaskRequest;
use App\Http\Resources\Collection\TaskCollection;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(ShowTaskRequest $request)
    {
        return new TaskCollection($this->taskRepository->all($request->validated()));
    }
}
