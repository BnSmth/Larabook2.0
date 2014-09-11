<?php namespace Larabook\Statuses;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PublishStatusRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'body' => 'required'
		];
	}

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'body.required' => 'The status field is required'
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
