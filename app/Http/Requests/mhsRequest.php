<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mhsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nim_mahasiswa' => 'required|string|unique:mahasiswas,nim,' . $this->mahasiswa,
            'nama_mahasiswa' => 'required|string',
        ];
    }
}
