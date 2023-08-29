<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompanyRequest extends FormRequest
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
        $uuid = $this->company;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'unique:companies'],
            'phone' => ['required', 'unique:companies'],
            'whatsapp' => ['required', 'unique:companies'],
            'email' => ['required', 'email', 'unique:companies,uuid,'.$this->company],
            'facebook' => ['required', 'unique:companies'],
            'instagram' => ['required', 'unique:companies'],
            'youtube' => ['required', 'unique:companies'],
        ];
    }
}
