<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTarifTolRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'asal' => 'required',
            'tujuan' => 'required',
            'gol1' => 'required',
            'gol2' => 'required',
            'gol3' => 'required',
            'gol4' => 'required',
            'gol5' => 'required',
        ];
    }
}