<?php

use app\api\service\EmailService;
use app\BaseController;

/**
 * 邮件发送控制器
 * 包含发送邮件功能
 */
class MailController extends  BaseController
{
    public function send()
    {
        $emailService = new EmailService();
        $to = 'recipient@example.com';
        $subject = 'Test Email';
        $body = '<h1>Hello!</h1><p>This is a test email.</p>';

        try {
            $emailService->sendEmail($to, $subject, $body);
            return json(['success' => true, 'message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
