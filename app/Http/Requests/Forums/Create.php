<?php namespace App\Http\Requests\Forums;

use App\Http\Requests\Request;

class Create extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
		// return auth()->user();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'channel' => 'required',
			'title' => 'required|max:255',
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'A title is required',
		];
	}

}
