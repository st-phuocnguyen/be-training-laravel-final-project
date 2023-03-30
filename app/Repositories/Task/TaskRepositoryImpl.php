<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class TaskRepositoryImpl implements TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function all(array $params)
    {
        $query = $this->task->where('assignee', $params['uuid']);;
        if (array_key_exists('q', $params)) {
            $keyword = $params['q'];
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            });
        }
        if (array_key_exists('type', $params)) {
            $query->where('type', $params['type']);
        }
        if (array_key_exists('status', $params)) {
            $query->where('status', $params['status']);
        }

        return $query->get();
    }

    public function create(array $task)
    {
        $task = $this->task->create($task);
        return $task;
    }

    public function getById($id)
    {
        return $this->task->find($id);
    }

    public function update(array $newData)
    {
        $task = $this->task->find($newData['id']);
        $task->update($newData);
        return $task;
    }

    public function delete($id)
    {
        $this->task->find($id)->delete();
    }
}
