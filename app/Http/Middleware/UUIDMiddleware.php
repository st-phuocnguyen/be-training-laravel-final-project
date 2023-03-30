<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class UUIDMiddleware
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Str::isUuid($request['uuid'])) {
            return response()->json([
                'message' => 'UUID is missing',
                'success' => false,

            ], 400);
        }
        if ($this->userRepository->getById($request['uuid']) == null) {
            return response()->json([
                'message' => 'UUID is invalid',
                'success' => false,

            ], 401);
        }
        return $next($request);
    }
}
