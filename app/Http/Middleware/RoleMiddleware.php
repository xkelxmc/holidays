<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;
class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guard()->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login')->with('status', 'Для доступа необходимо войти в систему');
            }
        }
        $roles = is_array($role)
            ? $role
            : explode('|', $role);
        if (! Auth::user()->hasAnyRole($roles)) {
//            throw UnauthorizedException::forRoles($roles);
            return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login')->with('status', 'Недостаточно прав для доступа к странице');
        }
        return $next($request);
    }
}