<?php

namespace App\Http\Middleware;

use App\Models\Permissions\ModuleMethod;
use App\Models\Permissions\RoleMethod;
use Closure;
use Illuminate\Http\Request;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_method = request()->route()->getActionName();
        $current_method = (explode('\\', $current_method));
        $current_method = end($current_method);
        $role_id = auth()->user()->role_id;
        $method = ModuleMethod::with(['role_methods' => function ($query) use ($role_id) {
            $query->where('role_id', $role_id);
        }])->where('method', $current_method)->first();

        if ($method) {
            $check = RoleMethod::where('role_id', $role_id)->where('method_id', $method->id)->first()->value;
            if ($check) {
                return $next($request);
            }
        }

        return back()->with(['not-allowed' => 'У вас нет доступа']);
    }
}
