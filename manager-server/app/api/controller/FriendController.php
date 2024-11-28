<?php

namespace app\api\controller;

use app\api\validate\FriendValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 档案管理
 */
class FriendController extends BaseController
{
    private $table_name = "app_friend";

    public function create()
    {
        try {
            validate(FriendValidate::class)->check($this->request->param());

            $data = $this->buildData([
                'name',
                'sex',
                'birth_data',
                'birth_type',
                'status',
                'avatar',
                'phone',
                'qq',
                'wechat',
                'email',
                'address',
                'remark',
                'live_address',
                'disposition',
                'advantage',
                'disadvantage',
                'hobby',
                'family',
                'work',
                'school',
            ]);
            $data['create_time'] = date('Y-m-d H:i:s');

            $id =  Db::table($this->table_name)->insert($data, true);
            $data['id'] = $id;
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function update()
    {
        try {
            validate(FriendValidate::class)->check($this->request->param());
            $id = $this->getParamId();
            $data = $this->buildData([
                'name',
                'sex',
                'birth_date',
                'birth_type',
                'status',
                'avatar',
                'phone',
                'qq',
                'wechat',
                'email',
                'address',
                'remark',
                'live_address',
                'disposition',
                'advantage',
                'disadvantage',
                'hobby',
                'family',
                'work',
                'school',
            ]);
            $data['update_time'] = date('Y-m-d H:i:s');
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
            if ($this->isSoftDelete()) {
                Db::table($this->table_name)->where('id', $id)->update($this->buildDataWithSoftDelete());
            } else {
                Db::table($this->table_name)->where('id', $id)->delete();
            }
            return $this->success($id);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function query()
    {
        try {
            $id = $this->getParamId();
            $data = Db::table($this->table_name)->where('id', $id)->find();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    public function queryList()
    {
        try {
            $data = Db::table($this->table_name)
                ->where('is_delete', '<>', '1')
                ->select()->toArray();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }
}
