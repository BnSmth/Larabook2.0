<?php  namespace Larabook\Users;

use Flyingfoxx\CommandCenter\CommandHandler;
use Flyingfoxx\CommandCenter\Eventing\EventDispatcher;

class FollowUserHandler implements CommandHandler{
    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository, EventDispatcher $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Follow a Larabook user.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $follower = $this->repository->findById($command->follower);

        $this->repository->follow($command->userToFollow, $follower);

        return $follower;
    }
}