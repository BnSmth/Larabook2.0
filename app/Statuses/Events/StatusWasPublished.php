<?php  namespace Larabook\Statuses\Events;

class StatusWasPublished {

    /**
     * @var body
     */
    public $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

}