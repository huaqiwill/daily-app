<?php

namespace app\api\controller;

use app\api\validate\BirthValidate;
use app\BaseController;
use Exception;
use think\facade\Db;
use think\Request;

/**
 * 生日管理
 * 生日新增、修改、删除、查询
 */
class BirthController extends BaseController
{
    /**
     * 新增生日
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            validate(BirthValidate::class)->check($this->request->post());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
                'birth_date' => $this->request->param('birth_date'),
                'birth_type' => $this->request->param('birth_type'),
                'phone' => $this->request->param('phone'),
                'email' => $this->request->param('email'),
                'wechat' => $this->request->param('wechat'),
                'qq' => $this->request->param('qq'),
            ];

            Db::table('app_birth')->insert($data);
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }


    /**
     * 修改生日
     * @return \think\response\Json
     */
    public function update()
    {
        try {
            validate(BirthValidate::class)->check($this->request->post());
            $id = $this->request->param('id');
            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
                'birth_date' => $this->request->param('birth_date'),
                'birth_type' => $this->request->param('birth_type'),
                'phone' => $this->request->param('phone'),
                'email' => $this->request->param('email'),
                'wechat' => $this->request->param('wechat'),
                'qq' => $this->request->param('qq'),
            ];

            Db::table('app_birth')->where('id', $id)->update($data);
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 删除生日
     * @return \think\response\Json
     */
    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table('app_birth')->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 查询生日信息
     * @return \think\response\Json
     */
    public function query()
    {
        try {
            $id = $this->request->param('id');
            $data = Db::table('app_birth')->where('id', $id)->find();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 查询生日集合
     * @return \think\response\Json
     */
    public function queryList()
    {
        try {
            $data = Db::table('app_birth')->select();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }
}
