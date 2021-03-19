<?php


namespace Kl;


class EmailService
{
    /**
     * @var string
     */
    private static $fromEmail = 'admin@test.com';

    /**
     * @return string
     */
    private static function getHeaders(): string
    {
        return 'From: ' . self::$fromEmail . "\r\n" .
            'Reply-To: ' . self::$fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    }


    /**
     * @return bool
     */
    public static function send($toEmail, $subject, $message): bool
    {
        return mail(
            $toEmail,
            $subject,
            $message,
            self::getHeaders()
        );
    }
}
