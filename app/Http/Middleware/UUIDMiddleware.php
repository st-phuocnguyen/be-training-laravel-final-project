<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\UserRepository;

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
        if (!$request->has('uuid') || $this->userRepository->getById($request['uuid']) == null) {
            return response()->json([
                'message' => 'Unauthorized',
                'success' => false,

            ], 401);
        }
        return $next($request);
    }
}
