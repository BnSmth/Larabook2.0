<?php  namespace Larabook\Statuses;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * A comment belongs to an owner.
     *
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

    public static function leave($body, $status_id)
    {
        return new static(compact('body', 'status_id'));
    }

}