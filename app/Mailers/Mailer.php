<?php  namespace Larabook\Mailers;

use Illuminate\Contracts\Mail\Mailer as Mail;

abstract class Mailer {

    /**
     * @var Mail
     */
    protected $mail;

    /**
     * @param Mail $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param $data
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        $this->mail->queue($view, $data, function($message) use($user, $subject)
        {
            $message->to($user->email)->subject($subject);
        });
    }
}