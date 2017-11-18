<?php

namespace Sperelson\PrettyParam\Middleware;

use Illuminate\Http\Request;

class PrettyParam
{

    public function handle(Request $request, \Closure $next)
    {
    	var_dump($request->server('REQUEST_URI'));
    	die;

        return $next($request);
    }

}
