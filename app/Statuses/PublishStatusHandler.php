<?php  namespace Larabook\Statuses;

use Flyingfoxx\CommandCenter\CommandHandler;
use Flyingfoxx\CommandCenter\Eventing\EventDispatcher;
use Larabook\Statuses\Status;
use Larabook\Statuses\StatusRepository;

class PublishStatusHandler implements CommandHandler{

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
        $status = Status::publish($command->body);

        $this->repository->save($status, $command->user_id);

        $this->dispatcher->dispatch($status->releaseEvents());

        return $status;
    }
}