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

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'unique:companies,uuid,'.$this->company],
            'phone' => ['required', 'unique:companies,uuid,'.$this->company],
            'whatsapp' => ['required', 'unique:companies,uuid,'.$this->company],
            'email' => ['required', 'email', 'unique:companies,uuid,'.$this->company],
            'facebook' => ['required', 'unique:companies,uuid,'.$this->company],
            'instagram' => ['required', 'unique:companies,uuid,'.$this->company],
            'youtube' => ['required', 'unique:companies,uuid,'.$this->company],
        ];
    }
}
