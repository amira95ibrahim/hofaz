<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'sender' => 'required|string|max:255',
            'consignee' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20|regex:/^[^<>]+$/',
            // 'card' => 'required|string|max:255',
            'donate'=>'required|numeric',
            'card'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'string' => trans('validation.string'),
            'max' => trans('validation.max'),
            'regex' => trans('validation.regex'),
            'email' => trans('validation.email'),
        //    'number'=>trans('validation.number'),
        ];
    }
}
