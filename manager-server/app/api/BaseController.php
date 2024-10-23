<?php

declare(strict_types=1);

namespace app;

use think\App;
use think\exception\ValidateException;
use think\Validate;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize() {}

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    // 通用的返回 JSON 数据的方法
    protected function jsonResponse($data = [], $code = 200, $message = 'Success')
    {
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        return json($response);
    }

    public function getParam($name, $default = '')
    {
        return $this->request->param($name, $default);
    }

    /**
     * 是否为软删除
     * @return bool
     */
    public function isSoftDelete()
    {
        return (bool)config('app.soft_delete');
    }

    /**
     * 获取参数ID
     * @return int
     */
    public function getParamId()
    {
        return (int)$this->request->param('id');
    }

    /**
     * 构造数据数组
     * @return array
     */
    public function buildData($keys)
    {
        $data = [];

        foreach ($keys as $key) {
            $value = $this->request->param($key);
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * 构造软删除数据数组
     * @return array
     */
    public function buildDataWithSoftDelete()
    {
        $data = [
            'delete_time' => date('Y-m-d H:i:s'),
            'is_delte' => 1,
        ];
        return $data;
    }
}
