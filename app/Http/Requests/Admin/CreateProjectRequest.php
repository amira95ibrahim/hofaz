<?php

namespace App\Http\Requests\Admin;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
        return $rules = [
            'country_id' => 'required',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string|max:255',
            'cost' => 'required|numeric',
            'paid' => 'required|numeric',
            'initial_amount' => 'required|numeric',
            'show_remaining' => 'required|boolean',
            'active' => 'required|boolean',
            'homepage' => 'required|boolean',
            'image' => 'required|nullable|file|max:255',
            'deleted_at' => 'nullable',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'category_id' => 'required|exists:categories,id|integer',
        ];
    }
}
