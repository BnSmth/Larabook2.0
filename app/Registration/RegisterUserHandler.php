<?php  namespace Larabook\Registration;

use Flyingfoxx\CommandCenter\CommandHandler;
use Flyingfoxx\CommandCenter\Eventing\EventDispatcher;
use Larabook\Users\User;
use Larabook\Users\UserRepository;

class RegisterUserHandler implements CommandHandler{

    /**
     * @var UserRepository
     */
    protected $repository;
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    public function __construct(UserRepository $userRepository, EventDispatcher $dispatcher)
    {
        $this->repository = $userRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Handle a command.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );
        $this->repository->save($user);
        $this->dispatcher->dispatch($user->releaseEvents());
        return $user;
    }
}