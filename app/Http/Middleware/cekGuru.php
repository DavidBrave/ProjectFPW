<?php

namespace App\Http\Middleware;

use Closure;

class cekGuru
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
        if(!$request->session()->has("guruLogin")){
            $request->session()->flash("message", "Halaman ini hanya bisa diakses oleh guru. Silahkan login terlebih dahulu");
            return redirect("/login");
        }
        return $next($request);
    }
}
