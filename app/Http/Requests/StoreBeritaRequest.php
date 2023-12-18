<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeritaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'judul' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'tanggal' => 'required',
            'paragraf1' => 'required',
            'paragraf2' => 'required',
            'paragraf3' => 'required',
        ];
    }
}