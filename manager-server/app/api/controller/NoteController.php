<?php

namespace app\api\controller;

use app\api\validate\NoteValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 笔记管理
 */
class NoteController extends BaseController
{
    private $table_name = 'app_note';

    public function create()
    {
        try {
            validate(NoteValidate::class)->check($this->request->post());

            $data = $this->buildData([
                'user_id',
                'title',
                'content',
                'date'
            ]);

            $data['create_time'] = date('Y-m-d H:i:s');

            Db::table($this->table_name)->insert($data);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function update()
    {
        try {
            $id = $this->getParamId();

            validate(NoteValidate::class)->check($this->request->post());

            $data = $this->buildData([
                'user_id',
                'title',
                'content',
                'date'
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
            if ($data) {
                return $this->success($data);
            } else {
                return $this->error('数据不存在', 404);
            }
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
