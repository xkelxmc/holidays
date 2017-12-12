<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;
class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::guard()->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login')->with('status', 'Для доступа необходимо войти в систему');
            }
        }
        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
        foreach ($permissions as $permission) {
            if (Auth::user()->can($permission)) {
                return $next($request);
            }
        }
//        throw UnauthorizedException::forPermissions($permissions);
        return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login')->with('status', 'Недостаточно прав для доступа к странице');
    }
}