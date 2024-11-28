<?php

namespace app\api\controller;

use app\api\validate\FoodValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 饮食管理
 */
class FoodController extends BaseController
{
    protected $table_name = 'app_food';

    public function create()
    {
        try {
            validate(FoodValidate::class)->check($this->request->param());
            $data = $this->buildData([
                'user_id',
                'name',
                'price',
                'type',
                'images',
                'date',
                'time',
                'notes'
            ]);
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['images'] = json_decode($data['images']);

            // 处理文件路径
            foreach ($data['images'] as $key => $image) {
                // 将 images 字段的 JSON 解码为数组
                $data['images'][$key] = 'http://localhost:8000/api/preview' . $image;
            }

            if (is_array($data['images']) && count($data['images']) > 0) {
                $data['thumbnail'] = $data['images'][0];
            } else {
                $data['thumbnail'] = '';
            }
            
            $id =  Db::table($this->table_name)->insert($data, true);
            $data['id'] = $id;
            $data['images'] = json_decode($data['images'], true);
            return $this->success($data);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }


    public function update()
    {
        try {
            $id = $this->getParamId();
            validate(FoodValidate::class)->check($this->request->put());
            $data = $this->buildData([
                'user_id',
                'name',
                'price',
                'images',
                'date',
                'time',
                'notes'
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
            $user = Db::table($this->table_name)->where('id', $id)->find();
            return $this->success($user);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function queryList()
    {
        try {
            $list = Db::table($this->table_name)
                ->where('is_delete', '<>', '1')
                ->select()->toArray();
            foreach ($list as &$item) {
                $item['images'] = json_decode($item['images'], true);
            }
            return $this->success($list);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
