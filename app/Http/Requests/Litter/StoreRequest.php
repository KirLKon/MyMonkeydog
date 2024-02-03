<?php

namespace App\Http\Requests\Litter;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sir_dog_id' => 'integer|required|gt:0',
            'dam_dog_id' => 'integer|required|gt:0',
            'letter' => 'string|required|regex:/^[a-zA-Z]+$/u',
            'description_ru' => 'string|required',
            'description_en' => 'string|required',
            'dob' => 'date|required',
            'presentation_image' => 'required|image|max:2048'
        ];
    }
}
