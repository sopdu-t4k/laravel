<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
            'source_id' => ['required', 'integer', 'min:1', 'exists:sources,id'],
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpg,png'],
            'status'  => ['required', 'string'],
            'preview' => ['nullable', 'string']
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Заголовок'
        ];
    }
}
