<?php

namespace app\api\controller;

use app\BaseController;

/**
 * 文件服务
 */
class FileController extends BaseController
{
    public function upload()
    {
        // 获取上传的文件
        $file = $this->request->file('file');

        // 检查文件大小是否超过限制
        $maxSize = 2 * 1024 * 1024;  // 2MB
        if ($file && $file->getSize() > $maxSize) {
            return json([
                'code' => 400,
                'message' => '上传文件大小不能超过2MB'
            ]);
        }

        if ($file) {
            // 获取当前日期
            $date = date('Ymd');  // 格式：20241105
            $fileType = pathinfo($file->getOriginalName(), PATHINFO_EXTENSION); // 获取文件类型（扩展名）

            // 获取文件的原始文件名（不带扩展名）
            $fileBaseName = pathinfo($file->getOriginalName(), PATHINFO_FILENAME);

            // 设置文件类型分类的目录，按日期和文件类型分类
            $uploadDir =   './uploads/' . $date . '/' . $fileType . '/';

            // 确保文件夹存在
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);  // 创建目录
            }

            // 生成唯一文件名（md5 + 当前日期）
            $newFileName = md5($fileBaseName . time()) . '.' . $fileType;

            // 移动文件到指定目录并重命名
            $info = $file->move($uploadDir, $newFileName);

            if ($info) {
                // 上传成功，返回文件下载地址
                $fileUrl = '/' . $date . '/' . $fileType . '/' . $newFileName;
                return $this->success(['path' => $fileUrl], '文件上传成功');
            } else {
                // 上传失败，返回错误信息
                return $this->error($file->getError());
            }
        } else {
            return $this->error('没有文件被上传');
        }
    }


    public function download(string $date, string $type, string $filename)
    {
        // 获取文件路径
        $filePath =  getcwd()
            . DIRECTORY_SEPARATOR . 'public'
            . DIRECTORY_SEPARATOR . 'uploads'
            . DIRECTORY_SEPARATOR . $date
            . DIRECTORY_SEPARATOR . $type
            . DIRECTORY_SEPARATOR . $filename;

        // 检查文件是否存在
        if (!file_exists($filePath)) {
            return $this->error('文件不存在');
        }

        // 设置下载头
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Content-Type: image/jpeg');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // 读取文件内容并输出
        readfile($filePath);
        exit;
    }

    public function preview(string $date, string $type, string $filename)
    {
        // 获取文件路径
        $filePath =  getcwd()
            . DIRECTORY_SEPARATOR . 'public'
            . DIRECTORY_SEPARATOR . 'uploads'
            . DIRECTORY_SEPARATOR . $date
            . DIRECTORY_SEPARATOR . $type
            . DIRECTORY_SEPARATOR . $filename;

        // 检查文件是否存在
        if (!file_exists($filePath)) {
            return $this->error('文件不存在');
        }

        // 获取文件的 MIME 类型，确保是图片
        $mimeType = mime_content_type($filePath);
        if (strpos($mimeType, 'image') === false) {
            return $this->error('文件类型不是图片');
        }

        // 设置响应头，返回图片内容
        header('Content-Type: ' . $mimeType);
        header('Cache-Control: public, max-age=3600');
        header('Pragma: public');

        // 输出图片内容
        readfile($filePath);
        exit;
    }
}
