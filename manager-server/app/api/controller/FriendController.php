<?php

namespace app\api\controller;

use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 关系、档案、个人信息管理
 * 新增、修改、删除、查询
 */
class FriendController extends BaseController
{
    /**
     * 用户档案新增
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
                'birth_date' => $this->request->param('birth_date'),
                'status' => $this->request->param('status'),
                'avatar' => $this->request->param('avatar'),
                'phone' => $this->request->param('phone'),
                'qq' => $this->request->param('qq'),
                'wechat' => $this->request->param('wechat'),
                'email' => $this->request->param('email'),
                'address' => $this->request->param('address'),
                'remark' => $this->request->param('remark'),
            ];
            $id =  Db::table('app_friend')->insert($data, true);
            $data['id'] = $id;
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 用户档案修改
     * @return \think\response\Json
     */
    public function update()
    {
        try {
            $id = $this->request->param('id');
            $postData = input('post.');
            Db::table('app_friend')->where('id', $id)->update($postData);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 用户档案删除
     * @return \think\response\Json
     */
    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table('app_friend')->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 用户档案查询
     * @return \think\response\Json
     */
    public function query()
    {
        try {
            $id = $this->request->param('id');
            $data = Db::table('app_friend')->where('id', $id)->find();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 用户档案查询列表
     * @return \think\response\Json
     */
    public function queryList()
    {
        try {
            $data = Db::table('app_friend')->select();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }
}
