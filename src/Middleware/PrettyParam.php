<?php

namespace Sperelson\PrettyParam\Middleware;

use Illuminate\Http\Request;

class PrettyParam
{
    public function handle(Request $request, \Closure $next)
    {
    	$query = $request->server('QUERY_STRING');

        if (!empty($query)) {
            $query = explode('&', $query);
            $params = [];
            $input = $request->input();

            foreach ($query as $param) {
                $item = explode('=', $param);

                if (count($item) === 2) {
                    $name = urldecode($item[0]);
                    $value = urldecode($item[1]);

                    if (substr($name, -2) !== '[]') {
                        $params[$name][] = $value;
                    }
                }
            }

            foreach ($params as $key => $param) {
                if (count($param) > 1) {
                    $input[$key] = $param;
                }
            }

	    	$request->merge($input);
        }

        return $next($request);
    }
}
