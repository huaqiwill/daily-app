<?php

namespace app\api\service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * 邮件服务
 */
class EmailService
{
    protected $mailer;

    public function __construct()
    {
        $config = config('email');

        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = $config['encryption'];
        $this->mailer->Port = $config['port'];
    }

    public function sendEmail($to, $subject, $body)
    {
        try {
            $this->mailer->setFrom(config('email.username'), 'Your Name');
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            throw new \Exception('Email could not be sent. Mailer Error: ' . $this->mailer->ErrorInfo);
        }
    }
}
