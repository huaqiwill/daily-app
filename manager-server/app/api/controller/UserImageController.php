<?php

namespace app\api\controller;

use app\api\validate\UserImageValidate;
use app\BaseController;
use Exception;
use think\facade\Db;

/**
 * 用户画像
 */
class UserImageController extends BaseController
{
    protected $table_name = 'app_user_image';

    public function create()
    {
        try {
            validate(UserImageValidate::class)->check($this->request->post());
            $data = $this->buildData([
                'user_id',
                'date',
                'images',
            ]);
            $data['create_time'] = date('Y-m-d H:i:s');

            // 处理文件路径
            foreach ($data['images'] as $key => $image) {
                // 将 images 字段的 JSON 解码为数组
                $data['images'][$key] = 'http://localhost:8000/api/preview' . $image;
            }

            $data['images'] = json_encode($data['images']);
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
            validate(UserImageValidate::class)->check($this->request->post());
            $data = $this->buildData([
                'user_id',
                'date',
                'images',
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
                ->where('is_delete', '<>', 1)
                ->select()->toArray();

            if ($list) {
                foreach ($list as $key => $value) {
                    // 将 images 字段的 JSON 解码为数组
                    $images = json_decode($value['images'], true);

                    // 确保 JSON 解码成功且是数组
                    if (is_array($images) && !empty($images)) {
                        // 添加 url 字段并设置为 images 中的第一张图片
                        $list[$key]['url'] = $images[0];
                        $list[$key]['images'] = $images;
                    } else {
                        // 如果 images 为空或不是数组，设置 url 为 null
                        $list[$key]['url'] = null;
                        $list[$key]['images'] = [];
                    }
                }
            }

            return $this->success($list);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }
}
