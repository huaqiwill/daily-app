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

            $data = $this->buildData([
                'name',
                'sex',
                'birth_date',
                'birth_type',
                'phone',
                'email',
                'wechat',
                'qq'
            ]);

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
            $id = $this->getParamId();
            validate(BirthValidate::class)->check($this->request->post());
            $data = $this->buildData([
                'name',
                'sex',
                'birth_date',
                'birth_type',
                'phone',
                'email',
                'wechat',
                'qq'
            ]);

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
            $id = $this->getParamId();
            if ($this->isSoftDelete()) {
                Db::table('app_birth')->where('id', $id)->update($this->buildDataWithSoftDelete());
            } else {
                Db::table('app_birth')->where('id', $id)->delete();
            }
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
            $id = $this->getParamId();
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
