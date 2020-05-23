<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRoleRequest extends FormRequest
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
        $rules = [
            'display_name' => 'required'
        ];

        //check this
        /*if($this->method()!=='POST'){*/
        if($this->method()!=='PUT'){
            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
    }

    public function messages(){
        return [
            'name.required' => 'This Idenficator field is required!',
            'name.unique' => 'This Identificator field already exists!',
            'display_name.required' => 'This Name field is required!'
        ];
    }
}
