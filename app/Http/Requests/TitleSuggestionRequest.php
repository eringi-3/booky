<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleSuggestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255', // 必須フィールドで、文字列であり、最大255文字まで許可
            'genre' => 'required|string|max:255', // 必須フィールドで、文字列であり、最大255文字まで許可
        ];
    }
}
