<?php namespace Larabook\Http\Controllers;

use Larabook\Statuses\LeaveCommentOnStatusRequest;

class CommentsController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth');
    }

    /**
     * Create new comment
     *
     * @param                             $id
     * @param LeaveCommentOnStatusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id, LeaveCommentOnStatusRequest $request)
    {
        $this->execute($request);
        return redirect()->back();
    }

}
