<?php

namespace App\Http\Requests\staff;

use Illuminate\Foundation\Http\FormRequest;

class addinventory extends FormRequest
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
            'item_code'=> 'required|max:20',
            'item_name'=> 'required|max:20',
            'item_quantity'=> 'required|max:5',
            'item_price'=> 'required|max:5'
        ];
    }
}
