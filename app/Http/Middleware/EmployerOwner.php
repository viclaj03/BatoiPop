<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$model)
    {
        $Model = 'App\\Models\\'.$model;
        $id = $request->segments()[1];
        $registre = $Model::findOrFail($id);
        if ($registre->id !== Auth::user()->id){
            abort(403,'No tienes permiso');
        }
        return $next($request);
    }
}
