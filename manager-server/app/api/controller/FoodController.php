<?php

namespace app\api\controller;

use app\api\validate\FoodValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 食物管理
 * 餐饮记录新增、修改、删除
 */
class FoodController extends BaseController
{
    protected $food_table = 'app_food';

    /**
     * 食物创建
     * 创建食物记录，新增基础信息，新增图片记录，
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            validate(FoodValidate::class)->check($this->request->param());
            $data = $this->buildData([
                'user_id',
                'category_id',
                'name',
                'describe',
                'status',
                'thumbnail'
            ]);
            $data['create_time'] = date('Y-m-d H:i:s');
            $id =  Db::table($this->food_table)->insert($data, true);
            $data['id'] = $id;
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * 食物更新
     * @return \think\response\Json
     */
    public function update()
    {
        try {
            $id = $this->getParamId();
            validate(FoodValidate::class)->check($this->request->param());
            $data = $this->buildData([
                'user_id',
                'category_id',
                'name',
                'describe',
                'status',
                'thumbnail'
            ]);
            $data['update_time'] = date('Y-m-d H:i:s');
            Db::table($this->food_table)->where('id', $id)->update($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * 食物删除
     * @return \think\response\Json
     */
    public function delete()
    {
        try {
            $id = $this->getParamId();
            if ($this->isSoftDelete()) {
                Db::table($this->food_table)->where('id', $id)->update($this->buildDataWithSoftDelete());
            } else {
                Db::table($this->food_table)->where('id', $id)->delete();
            }
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * 食物查询
     * @return \think\response\Json
     */
    public function query()
    {
        try {
            $id = $this->getParamId();
            $user = Db::table($this->food_table)->where('id', $id)->find();
            return $this->jsonResponse($user);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * 食物查询列表
     * @return \think\response\Json
     */
    public function queryList()
    {
        try {
            $list = Db::table($this->food_table)->select();
            return json($list);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }
}
