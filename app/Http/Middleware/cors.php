<?php

namespace App\Http\Middleware;

use Closure;

class cors
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
        return $next($request);
        // ->header(‘Access-Control-Allow-Origin’, ‘*’) ->header(‘Access-Control-Allow-Methods’, ‘GET, POST, PUT, DELETE, OPTIONS’) ->header(‘Access-Control-Allow-Headers’, ‘X-Requested-With, Content-Type, X-Token-Auth, Authorization’);

        $allowedOrigins = ['http://localhost:3000/register'];
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        if (in_array($origin, $allowedOrigins)) {
            return $next($request)
                ->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers',' Origin, Content-Type, Accept, Authorization, X-Request-With, cache-control,postman-token, token')
                ->header('Access-Control-Allow-Credentials',' true');
        }
        return $next($request);
        
            //     header(‘Access-Control-Allow-Origin’, ‘*’);
            //     //ALLOW OPTIONS METHOD
            //     $headers = [
            //         'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            //         'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
            //     ];
            //     if($request -> getMethod() == "OPTIONS"){
            //         // The clinet-side application can set only headers allowed in Access-Control-Allow-headers
            //         return respone()->json('OK', 200, $headers);
            //     }
            //     $response = $next($request);
            //     foreach($headers as $key => $value){
            //         $response -> header($key,$value);
            //     }
            //         return $response;
            // }
}
}