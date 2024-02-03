<?php

namespace App\Http\Requests\Puppy;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'main_image' => 'file|max:2048',
            'sex' => 'integer|required',
            'color' => 'string',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'file|max:2048',
            'owner' => 'string|nullable',
            'owner_phone' => 'string|nullable',
            'owner_email' => 'string|email:rfc,dns|nullable',
            'country_ru' => 'string|nullable',
            'country_en' => 'string|nullable',
            'city_ru' => 'string|nullable',
            'city_en' => 'string|nullable',
            'lon' => 'string|nullable',
            'lat' => 'string|nullable',
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
            'owner_email.email' => 'Некорректный email',
        ];
    }
}
