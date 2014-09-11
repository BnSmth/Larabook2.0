<?php namespace Larabook\Http\Controllers;

use Larabook\Statuses\PublishStatusRequest;
use Larabook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;
use Auth, Redirect;

class StatusesController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param StatusRepository $repository
     * @return Response
     */
	public function index(StatusRepository $repository)
	{
        $statuses = $repository->getFeedForUser(Auth::user());
		return view('statuses.index')->withStatuses($statuses);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param PublishStatusRequest $request
     * @return Response
     */
	public function store(PublishStatusRequest $request)
	{
		$status = $this->execute($request);

        Flash::message('Your status has been updated');
        return redirect()->back();
	}
}
