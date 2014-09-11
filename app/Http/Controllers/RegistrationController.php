<?php namespace Larabook\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticator;
use Larabook\Registration\RegisterUserRequest;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('csrf', ['on' => ['post']]);
        $this->beforeFilter('guest');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    return view('registration.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param RegisterRequest $request
     * @param Authenticator   $auth
     * @return Response
     */
	public function store(RegisterUserRequest $request, Authenticator $auth)
	{
        $user = $this->execute($request);
        $auth->login($user);
        Flash::message('Glad to have you as a new Larabook member!');
        return redirect()->route('home');
	}
}
