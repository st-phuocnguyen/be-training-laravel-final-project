<?php

namespace App\Repositories\User;

use App\Models\Task;
use App\Models\User;
use App\Repositories\User\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    protected $user;
    protected $task;

    public function __construct(User $user, Task $task)
    {
        $this->user = $user;
        $this->task = $task;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function create(array $user)
    {
        $user = $this->user->create($user);
        return $user;
    }

    public function getById($uuid)
    {
        return $this->user->with('task')->where('uuid', $uuid)->firstOrFail();
    }

    public function update(array $newData)
    {
        $user = $this->user->where('uuid', $newData['uuid']);
        $user->update($newData);
        return $user->first();
    }

    public function delete($uuid)
    {
        $this->user->where('uuid', $uuid)->delete();
    }
}
