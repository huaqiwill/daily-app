<?php

namespace app\api\controller;

use app\api\validate\BillValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 账单
 * 账单新增、修改、删除、查询
 */
class BillController extends BaseController
{
    /**
     * 创建账单
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            validate(BillValidate::class)->check($this->request->post());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table('app_bill')->insert($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 更新账单
     * @return \think\response\Json
     */
    public function update()
    {
        try {
            $id = $this->request->param('id');
            validate(BillValidate::class)->check($this->request->post());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table('app_bill')->where('id', $id)->update($data);
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 删除账单
     * @return \think\response\Json
     */
    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table('app_bill')->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 查询账单
     * @return \think\response\Json
     */
    public function query()
    {
        try {
            $id = $this->request->param('id');
            $data = Db::table('app_bill')->where('id', $id)->find();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 查询账单集合
     * @return \think\response\Json
     */
    public function queryList()
    {
        try {
            $data = Db::table('app_bill')->select();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }
}
