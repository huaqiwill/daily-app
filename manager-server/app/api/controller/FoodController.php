<?php

namespace app\api\controller;

use app\api\validate\FoodValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 食物
 * 餐饮记录新增、修改、删除
 */
class FoodController extends BaseController
{
    protected $food_table = 'app_food';

    /**
     * 创建食物记录，新增基础信息，新增图片记录，
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            validate(FoodValidate::class)->check(input('post.'));
            $data = [
                'user_id' => $this->request->param('username'),
                'category_id' => $this->request->param('password'),
                'name' => $this->request->param('nickname'),
                'describe' => $this->request->param('sex'),
                'create_time' =>  date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'thumbnail' => $this->request->param('thumbnail'),
            ];

            $id =  Db::table($this->food_table)->insert($data, true);
            $data['id'] = $id;
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table($this->food_table)->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function query()
    {
        try {
            $id = $this->request->param('id');
            $user = Db::table($this->food_table)->where('id', $id)->find();
            return $this->jsonResponse($user);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function update()
    {
        try {
            $id = $this->request->param('id');
            validate(FoodValidate::class)->check(input('post.'));

            $data = [
                'user_id' => $this->request->param('username'),
                'category_id' => $this->request->param('password'),
                'name' => $this->request->param('nickname'),
                'describe' => $this->request->param('sex'),
                'create_time' =>  date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'thumbnail' => $this->request->param('thumbnail'),
            ];

            Db::table($this->food_table)->where('id', $id)->update($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

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
