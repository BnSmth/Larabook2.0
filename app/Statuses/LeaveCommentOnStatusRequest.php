<?php namespace Larabook\Statuses;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class LeaveCommentOnStatusRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'status_id' => 'required|exists:statuses,id',
            'body' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user_id == Auth::user()->id;
    }

}
