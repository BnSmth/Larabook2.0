<?php  namespace Larabook\Statuses;

use Flyingfoxx\CommandCenter\Eventing\EventGenerator;
use Illuminate\Database\Eloquent\Model;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Presenter\PresentableTrait;

class Status extends Model {

    use EventGenerator, PresentableTrait;

    /**
    * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['body', 'user_id'];

    /**
     * Path to the presenter for a status
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * A status belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * A status has many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

    /**
     * Publish a new status.
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));
        return $status;
    }

}