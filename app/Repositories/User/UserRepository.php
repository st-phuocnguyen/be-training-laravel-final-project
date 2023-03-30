<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function all();

    public function create(array $user);

    public function getById($id);

    public function update(array $new);

    public function delete($uuid);
}
