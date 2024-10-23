<?php

namespace app\api\controller;

use app\api\validate\FriendValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 朋友管理
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
            validate(FriendValidate::class)->check($this->request->param());
            $id = $this->getParamId();
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
            $data['update_time'] = date('Y-m-d H:i:s');
            Db::table('app_friend')->where('id', $id)->update($data);
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
            $id = $this->getParamId();
            if ($this->isSoftDelete()) {
                $data = [
                    'delete_time' => date('Y-m-d H:i:s'),
                    'is_delte' => 1,
                ];
                Db::table('app_friend')->where('id', $id)->update($data);
            } else {
                Db::table('app_friend')->where('id', $id)->delete();
            }
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
            $id = $this->getParamId();
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
