<?php

namespace App\Http\Requests\Admin;

use App\Models\Kafala;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKafalaRequest extends FormRequest
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
        $rules = Kafala::$rules;

        return $rules;
    }
}
