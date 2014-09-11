<?php namespace Larabook\Users;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FollowUserRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userToFollow' => 'required|exists:users,id',
            'follower' => 'required|exists:users,id'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->follower == Auth::user()->id;
    }

}
