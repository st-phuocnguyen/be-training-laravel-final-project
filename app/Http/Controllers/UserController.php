<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\Resource\UserResource;
use App\Http\Resources\Collection\UserCollection;

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

    public function show(ShowUserRequest $request)
    {
        return new UserResource($this->userRepository->getById($request['uuid']));
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
