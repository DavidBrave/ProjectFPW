<?php

namespace App\Http\Middleware;

use Closure;

class cekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has("adminLogin")){
            $request->session()->flash("message", "Halaman ini hanya bisa diakses oleh Admin.");
            return redirect("/login");
        }
        return $next($request);
    }
}
