<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KapalRequest extends FormRequest
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
            'nama_kapal' => 'required|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'pk_gt' => 'required|max:255',
            'alamat_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|max:255',
        ];
    }
}
