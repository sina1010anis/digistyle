<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Step2 extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->CodeMil == 0 || auth()->user()->Phone == 0 || auth()->user()->Mobile == 0){
            return redirect(route('CompletionRegistr'));
        }else{
            return $next($request);
        }
/*        auth()->user()->CodeMil == 0 || auth()->user()->Phone == 0 || auth()->user()->Mobile == 0*/

    }
}
