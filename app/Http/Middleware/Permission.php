<?php

namespace App\Http\Middleware;

use App\Models\RolePermission;
use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$model,$action)
    {
        $user_permisson = UserPermission::where('user_id',Auth::user()->id)->where('model',$model)->where('action',$action)->first();

        if ($user_permisson == null) {
    
            abort(403, 'Unauthorized');
    
        }else {
    
            return $next($request);
        } 
    }
}
