<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixItUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jumbled' => 'required|min:10',
            'answer' => 'required|min:10',
            'explanation' => 'required|min:10',
        ];
    }

    public function messages()
    {
      return [
        'jumbled.required' => 'Jumbled question is required!',
        'answer.required' => 'An answer is required!',
        'explanation.required' => 'An explanation is required',
        'jumbled.min' => 'Jumbled question is minimum to 10 characters!',
        'answer.min' => 'An answer is minimum to 10 characters',
        'explanation.min' => 'An explanation is minimum to 10 characters',
      ];
    }
}
