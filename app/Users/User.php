<?php namespace Larabook\Users;

use Flyingfoxx\CommandCenter\Eventing\EventGenerator;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\Remindable as RemindableContract;
use Hash;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements UserContract, RemindableContract {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Which fields may be mass assigned
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * Path to the presenter for a user
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

    /**
     * Hash the password field automatically when set.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * A user has many statuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }

    /**
     * A user has many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * Determine if the given user is the same as the current one.
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if(is_null($user)) return false;
        return $this->username == $user->username;
    }
}
