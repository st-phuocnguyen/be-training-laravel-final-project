<?php

namespace App\Repositories\Task;

interface TaskRepository
{
    public function all(array $params);

    public function create(array $user);

    public function getById($id);

    public function update(array $new);

    public function delete($uuid);
}
