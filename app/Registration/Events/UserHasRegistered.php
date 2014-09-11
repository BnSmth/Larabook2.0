<?php  namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserHasRegistered {

    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

}