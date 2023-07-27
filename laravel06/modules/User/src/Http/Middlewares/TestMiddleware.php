<?php
namespace Modules\User\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        echo "Test Middleware";
        return $next($request);
    }
}
