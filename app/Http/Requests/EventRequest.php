<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'tag_id' => 'required|integer',
            'creator_id' => 'required|integer',
            'title' => 'required|string',
            'picture' => 'string',
            'description' => 'required|string',
            'address' => 'string',
            'city' => 'string',
            'region' => 'string',
            'is_IRL' => 'required|boolean',
            'participant_max' => 'required|integer',
            'start_date' => 'required|date',
        ];
    }
}
