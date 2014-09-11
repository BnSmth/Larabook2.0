<?php  namespace Larabook\Handlers;

use Flyingfoxx\CommandCenter\Eventing\EventListener;
use Larabook\Mailers\UserMailer;
use Larabook\Registration\Events\UserHasRegistered;

class EmailNotifier extends EventListener {

    /**
     * @var UserMailer
     */
    protected $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
}