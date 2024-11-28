<?php

namespace app\api\middleware;

class CorsMiddleware
{
    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        // 设置跨域头
        $response->header([
            'Access-Control-Allow-Origin' => '*', // 允许的域名，* 表示任意域名
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS', // 允许的 HTTP 方法
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With', // 允许的自定义请求头
            'Access-Control-Allow-Credentials' => 'true', // 是否允许携带 Cookie
        ]);

        // 对于预检请求直接返回
        if ($request->isOptions()) {
            $response->code(204); // 返回状态码 204
        }
        
        return $response;
    }
}
