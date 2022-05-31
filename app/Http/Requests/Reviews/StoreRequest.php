<?php

namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:50'],
            'message' => ['required', 'string']
        ];
    }

    public function messages(): array
	{
            return [
                'required' => 'Необходимо заполнить поле «:attribute»'
            ];
	}

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'message' => 'Сообщение'
        ];
    }
}
