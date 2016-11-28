<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class GetUserFromToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$token = $this->auth->setRequest($request)->getToken()) {
            return response()->json([
                'success' => false,
                'code' => 'TOKEN_NOT_PROVIDED'
            ], 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json([
                'success' => false,
                'code' => 'TOKEN_EXPIRED'
            ], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'code' => 'TOKEN_INVALID'
            ], $e->getStatusCode());
        }

        if (!$user) {
            return response()->json([
                'success' => false,
                'code' => 'USER_NOT_FOUND'
            ], 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
