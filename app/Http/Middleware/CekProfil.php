<?php

namespace App\Http\Middleware;

use App\Models\Profil;
use Closure;
use Illuminate\Http\Request;

class CekProfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $profile = Profil::where('user_id', '=', auth()->user()->id)->first();
        if(!$profile->nama){
            return redirect()->route('viewprofil')->with('warning', 'Lengkapi profil anda terlebih dahulu!');
        }
        return $next($request);
    }
}
