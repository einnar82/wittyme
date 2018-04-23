<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NymrushRequest extends FormRequest
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
            'synonym' => 'required',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'answer' => 'required',
        ];
    }

    public function messages()
    {
      return [
        'synonym.required' => 'A synonym is required',
        'choice1.required'  => 'Choice number 1 is required',
        'choice2.required'  => 'Choice number 2 is required',
        'choice3.required'  => 'Choice number 3 is required',
        'answer.required'  => 'Answer is required',
      ];
    }
}
