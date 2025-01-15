<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $to, string $subject, string $content): void
    {
        $email = (new Email())
            ->from('noreply@yourdomain.com')
            ->to($to)
            ->subject($subject)
            ->text($content)
            ->html($content);

        $this->mailer->send($email);
    }
}
