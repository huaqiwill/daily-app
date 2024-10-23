<?php

namespace app\api\controller;

use app\api\validate\NoteValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 笔记管理
 * 笔记新增、修改、删除、查询
 * 其他功能：
 *  评论、点赞、收藏、分享
 */
class NoteController extends BaseController
{
    /**
     * 笔记创建
     * @return \think\response\Json
     */
    public function create()
    {
        try {
            validate(NoteValidate::class)->check($this->request->param());

            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table('app_note')->insert($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 笔记更新
     * @return \think\response\Json
     */
    public function update()
    {
        try {
            validate(NoteValidate::class)->check($this->request->param());
            $id = $this->request->param('id');
            $data = [
                'name' => $this->request->param('name'),
                'sex' => $this->request->param('sex'),
            ];

            Db::table('app_note')->where('id', $id)->update($data);

            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 笔记删除
     * @return \think\response\Json
     */
    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table('app_note')->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 笔记详情
     * @return \think\response\Json
     */
    public function query()
    {
        try {
            $id = $this->request->param('id');
            $data = Db::table('app_note')->where('id', $id)->find();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }

    /**
     * 笔记查询
     * @return \think\response\Json
     */
    public function queryList()
    {
        try {
            $data = Db::table('app_note')->select();
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse([], $e->getMessage(), 500);
        }
    }
}
