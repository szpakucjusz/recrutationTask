<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
        //There is option to add cutom validate rules, but in this case there is no needed.
        return [
            'name' => 'required|unique:task|min:3|max:255',
            'priority' => 'required|integer',
        ];
    }
}
