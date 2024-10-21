<?php

namespace app\api\controller;

use app\BaseController;
use app\service\QiniuService;

class File extends BaseController
{
    function upload()
    {
        $qiniuService = new QiniuService();
        try {
            $filePath = 'path/to/your/file.jpg';
            $key = 'your-file-key.jpg';
            $result = $qiniuService->upload($filePath, $key);
            return json(['success' => true, 'data' => $result]);
        } catch (\Exception $e) {
            return json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function download() {}
}
