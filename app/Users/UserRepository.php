<?php namespace Larabook\Users;

class UserRepository {

    /**
     * Persist a user
     *
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Find a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * Find a user by there id.
     *
     * @param $user_id
     * @return \Illuminate\Support\Collection|static
     */
    public function findById($user_id)
    {
        return User::findOrFail($user_id);
    }

    /**
     * Follow a Larabook user.
     *
     * @param      $userToFollow
     * @param User $followingUser
     */
    public function follow($userToFollow, User $followingUser)
    {
        return $followingUser->followedUsers()->attach($userToFollow);
    }

    /**
     * Unfollow a Larabook user.
     *
     * @param      $userToUnfollow
     * @param User $followingUser
     * @return int
     */
    public function unfollow($userToUnfollow, User $followingUser)
    {
        return $followingUser->followedUsers()->detach($userToUnfollow);
    }
}