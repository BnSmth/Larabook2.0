<?php namespace Larabook\Http\Controllers;

use Larabook\Sessions\LoginUserRequest;
use Laracasts\Flash\Flash;
use Auth, Redirect;

class SessionsController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('guest', ['except' => ['destroy']]);
        $this->beforeFilter('auth', ['only' => ['logout']]);
    }

	/**
	 * Show the form for logging in
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('sessions.create');
	}

    /**
     * Attempt to log the user in with the provided credentials.
     *
     * @param LoginUserRequest $request
     * @return Response
     */
	public function store(LoginUserRequest $request)
	{
        if( ! Auth::attempt($request->only('email', 'password')))
        {
            Flash::error('We were unable to sign you in. Please check your credentials and try again!');
            return Redirect::back()->withInput();
        }
        Flash::message('Welcome back');
        return redirect()->route('statuses_path');
    }

	/**
	 * Log out the current user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        Flash::message('You have successfully been logged out.');
        return redirect()->route('home');
	}
}
