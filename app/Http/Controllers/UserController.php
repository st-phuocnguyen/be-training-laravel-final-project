<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\IndexUserRequest;
use App\Repositories\UserRepository;
use App\Http\Requests\ShowUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return new UserCollection($this->userRepository->all());
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource($this->userRepository->create($request->validated()));
    }

    public function show(string $uuid)
    {
        return new UserResource($this->userRepository->getById($uuid));
    }

    public function update(UpdateUserRequest $request)
    {
        return new UserResource($this->userRepository->update($request->validated()));
    }

    public function destroy(DeleteUserRequest $request)
    {
        return new UserResource($this->userRepository->delete($request->validated()['uuid']));
    }
}
