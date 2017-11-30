<?php namespace App\Http\Requests\Timeline;

use App\Http\Requests\Request;

class TimelineRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return auth()->user();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'description' => 'required',
		];
	}


}
