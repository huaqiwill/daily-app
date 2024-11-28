<?php

namespace app\api\controller;

use app\api\validate\BillValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 账单管理
 */
class BillController extends BaseController
{
    private $table_name = "app_bill";

    public function create()
    {
        try {
            validate(BillValidate::class)->check($this->request->post());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table($this->table_name)->insert($data);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }


    public function update()
    {
        try {
            $id = $this->request->param('id');
            validate(BillValidate::class)->check($this->request->post());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table($this->table_name)->where('id', $id)->update($data);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function delete()
    {
        try {
            $id = $this->getParamId();
            Db::table($this->table_name)->where('id', $id)->delete();
            return $this->success($id);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function query()
    {
        try {
            $id = $this->request->param('id');
            $data = Db::table($this->table_name)->where('id', $id)->find();
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function queryList()
    {
        try {
            $data = Db::table($this->table_name)
                ->where('is_delete', '<>', '1')
                ->select()->toArray();

            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
