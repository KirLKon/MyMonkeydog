<?php

namespace App\Http\Requests\Puppy;

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
            'name' => 'string|required',
            'litter_id' => 'integer|required|exists:litters,id',
            'main_image' => 'required|file|max:2048',
            'sex' => 'integer|required',
            'color' => 'string',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'file|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Надо заполнить кличку для отображения на сайте',
            'name.string' => 'Надо заполнить кличку для отображения на сайте',
            'litter_id.exists' => 'Необходимо выбрать помет',
            'main_image.required' => 'Необходимо приложить изображение',
            'main_image.max' => 'Слишком большой вес',
        ];
    }
}
