<?php  namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository {

    /**
     * Persist a status for a user
     *
     * @param Status $status
     * @param        $user_id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(Status $status, $user_id)
    {
        return User::findOrFail($user_id)->statuses()->save($status);
    }

    public function getAllForUser($user_id)
    {
        return User::findOrFail($user_id)->statuses()->with('user')->latest()->get();
    }

    /**
     * Get the feed for a user
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }

    public function leaveComment($user_id, $status_id, $body)
    {
        $comment = Comment::leave($body, $status_id);
        User::findOrFail($user_id)->comments()->save($comment);
        return $comment;
    }
}