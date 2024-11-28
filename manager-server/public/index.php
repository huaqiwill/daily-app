<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;



require __DIR__ . '/../vendor/autoload.php';


header("Access-Control-Allow-Origin: *"); // 允许任意域名
header("Access-Control-Allow-Methods: *"); // 允许的 HTTP 方法
header("Access-Control-Allow-Headers: *"); // 允许的请求头
header("Access-Control-Allow-Credentials: true"); // 是否允许携带 Cookie

// 检查 OPTIONS 请求
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // 提前返回响应，避免继续执行后续逻辑
    exit;
}

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);
