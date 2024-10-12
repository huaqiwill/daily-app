<?php
// 应用公共文件

if (!function_exists('get_config')) {
    /**
     * 获取配置项
     * @param string $name 配置项名称
     * @param mixed $default 默认值
     * @return mixed
     */
    function get_config($name, $default = null)
    {
        return config($name, $default);
    }
}

if (!function_exists('json_response')) {
    /**
     * JSON 格式返回数据
     * @param mixed $data 返回数据
     * @param int $code 状态码
     * @param string $message 消息
     */
    function json_response($data, $code = 200, $message = 'success')
    {
        return json(['code' => $code, 'message' => $message, 'data' => $data]);
    }
}

if (!function_exists('get_request_param')) {
    /**
     * 获取请求参数
     * @param string $key 参数名
     * @param mixed $default 默认值
     * @return mixed
     */
    function get_request_param($key, $default = null)
    {
        return request($key, $default);
    }
}

if (!function_exists('set_session')) {
    /**
     * 设置 session
     * @param string $key session 键
     * @param mixed $value session 值
     */
    function set_session($key, $value)
    {
        session($key, $value);
    }
}

if (!function_exists('get_session')) {
    /**
     * 获取 session
     * @param string $key session 键
     * @param mixed $default 默认值
     * @return mixed
     */
    function get_session($key, $default = null)
    {
        return session($key, $default);
    }
}

if (!function_exists('set_cookie')) {
    /**
     * 设置 cookie
     * @param string $key cookie 键
     * @param mixed $value cookie 值
     * @param int $expire 过期时间
     */
    function set_cookie($key, $value, $expire = 0)
    {
        cookie($key, $value, $expire);
    }
}

if (!function_exists('get_cookie')) {
    /**
     * 获取 cookie
     * @param string $key cookie 键
     * @param mixed $default 默认值
     * @return mixed
     */
    function get_cookie($key, $default = null)
    {
        return cookie($key, $default);
    }
}
