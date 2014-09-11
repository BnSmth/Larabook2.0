<?php namespace Larabook\Http\Controllers;

use Larabook\Users\FollowUserRequest;
use Larabook\Users\UnfollowUserRequest;
use Laracasts\Flash\Flash;
use Redirect;

class FollowsController extends BaseController {

    /**
     * Follow a user.
     *
     * @param FollowUserRequest $request
     * @return mixed
     */
    public function store(FollowUserRequest $request)
    {
        $this->execute($request);
        Flash::success('You are now following this user');
        return redirect()->back();
	}

    /**
     * Unfollow a user.
     *
     * @param UnfollowUserRequest $request
     * @internal param $id
     */
    public function destroy(UnfollowUserRequest $request)
    {
        $this->execute($request);
        Flash::success('You are no longer following this user');
        return redirect()->back();
    }

}
