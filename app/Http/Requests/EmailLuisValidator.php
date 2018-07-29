<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailLuisValidator extends FormRequest
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
            'email' => 'required|email|string|max:255',
            'name' => 'required|max:255|string',
            'message' => 'bail|required|min:3|max:1000|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        // Change this to a language file that will have all the validation messages of all stuff... See:
        //
        // https://laravel.com/docs/5.6/validation#custom-error-messages
        return [
            'email.required' => 'You need to set an Email',
            'email.email' => 'This isn\'t a valid Email.',
            'email.string' => 'This isn\'t a valid Text.',
            'email.max' => 'Email can\'t be 255 characters long.',
            'name.required' => 'A name is required.',
            'name.string' => 'The name must be a valid text.',
            'message.required' => ' A messages is required.',
            'message.min' => 'The message can\'t be less than 3 characters.',
            'message.max' => 'The message can\'t be more than 1000 characters.',
            'message.max' => 'The message must be a valid text.',
        ];
    }
}
