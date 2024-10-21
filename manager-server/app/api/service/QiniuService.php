<?php

namespace app\service;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

/**
 * 七牛云服务
 * 上传
 * 下载
 * 删除
 */
class QiniuService
{
    protected $auth;
    protected $bucket;

    public function __construct()
    {
        $config = config('qiniu');
        $this->auth = new Auth($config['access_key'], $config['secret_key']);
        $this->bucket = $config['bucket'];
    }

    public function upload($filePath, $key)
    {
        $uploadManager = new UploadManager();
        $token = $this->auth->uploadToken($this->bucket);

        list($ret, $err) = $uploadManager->putFile($token, $key, $filePath);
        if ($err !== null) {
            throw new \Exception('Upload failed: ' . $err->message());
        }
        
        return $ret;
    }
}
