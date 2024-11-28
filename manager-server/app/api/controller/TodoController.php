<?php

namespace app\api\controller;

use app\api\validate\TodoValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 待办管理
 */
class TodoController extends BaseController
{
    private $table_name = 'app_todo';

    public function create()
    {
        try {
            validate(TodoValidate::class)->check($this->request->post());
            $data = $this->buildData([
                'name',
                'describe',
                'start_time',
                'end_time',
                'remind_time',
                'user_id',
            ]);
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['id'] = Db::table($this->table_name)->insert($data, true);
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
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error(500, $e->getMessage());
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
            return $this->error(500, $e->getMessage());
        }
    }

    public function update()
    {
        try {
            validate(TodoValidate::class)->check($this->request->post());
            $id = $this->getParamId();
            $data = $this->buildData([
                'name',
                'describe',
                'start_time',
                'end_time',
                'remind_time',
                'user_id',
            ]);
            $data['update_time'] = date('Y-m-d H:i:s');
            Db::table($this->table_name)->where('id', $id)->update($data);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
