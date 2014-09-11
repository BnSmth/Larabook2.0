<?php namespace Larabook\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\PasswordBroker;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RemindersController extends BaseController {

	/**
	 * The password reminder implementation.
	 *
	 * @var PasswordBroker
	 */
	protected $passwords;

    /**
     * Create a new password reminder controller instance.
     *
     * @param  PasswordBroker $passwords
     * @return \Larabook\Http\Controllers\RemindersController
     */
	public function __construct(PasswordBroker $passwords)
	{
        parent::__construct();

		$this->passwords = $passwords;
		$this->beforeFilter('guest');
		$this->beforeFilter('csrf', ['on' => ['post']]);
	}

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return view('passwords.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postRemind(Request $request)
	{
		switch ($response = $this->passwords->remind($request->only('email')))
		{
			case PasswordBroker::INVALID_USER:
                Flash::error(trans($response));
				return redirect()->back();

			case PasswordBroker::REMINDER_SENT:
                Flash::message(trans($response));
                return redirect()->back();
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return view('passwords.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postReset(Request $request)
	{
		$credentials = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = $this->passwords->reset($credentials, function($user, $password)
		{
			$user->password = $password;
			$user->save();
		});

		switch ($response)
		{
			case PasswordBroker::INVALID_PASSWORD:
			case PasswordBroker::INVALID_TOKEN:
			case PasswordBroker::INVALID_USER:
                Flash::error(trans($response));
				return redirect()->back();

			case PasswordBroker::PASSWORD_RESET:
                Flash::success('Your password has been reset, you may now login');
				return redirect()->to('/');
		}
	}

}
