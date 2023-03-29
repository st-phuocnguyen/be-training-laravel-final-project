<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
        return $this->user->where('uuid', $uuid)->first();
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
