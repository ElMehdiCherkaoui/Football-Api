<?php

namespace App\Http\Requests;

use App\Models\FootballData;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFootballDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', Rule::in([FootballData::TYPE_FIXTURES, FootballData::TYPE_TOPSCORERS])],
            'league' => ['required', 'integer', 'min:1'],
            'season' => ['required', 'integer', 'digits:4'],
            'payload' => ['required', 'array'],
            'payload_json' => ['required', 'string', 'json'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $payloadJson = $this->input('payload_json');

        if (is_string($payloadJson)) {
            $decoded = json_decode($payloadJson, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $this->merge([
                    'payload' => $decoded,
                ]);
            }
        }
    }
}
