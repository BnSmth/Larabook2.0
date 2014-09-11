<?php namespace Larabook\Http\Controllers;

use Larabook\Users\UserRepository;

class UsersController extends BaseController {

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->repository->getPaginated();
        return view('users.index')->withUsers($users);
	}

    public function show($username)
    {
        $user = $this->repository->findByUsername($username);
        return view('users.show')->withUser($user);
    }
}
