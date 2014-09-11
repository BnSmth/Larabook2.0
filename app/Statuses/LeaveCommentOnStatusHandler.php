<?php  namespace Larabook\Statuses;

use Flyingfoxx\CommandCenter\CommandHandler;
use Flyingfoxx\CommandCenter\Eventing\EventDispatcher;
use Larabook\Statuses\Status;
use Larabook\Statuses\StatusRepository;

class LeaveCommentOnStatusHandler implements CommandHandler{

    /**
     * @var StatusRepository
     */
    protected $repository;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;


    public function __construct(StatusRepository $repository, EventDispatcher $dispatcher)
    {
        $this->repository = $repository;
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
        $comment = $this->repository->leaveComment($command->user_id, $command->status_id, $command->body);


    }
}