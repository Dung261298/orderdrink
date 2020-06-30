<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     public function rules(Request $request)
    {
        if ($this->method()=='PUT'){
            return [
                'name' => 'required|max:50|min:5|string|unique:categories,name,'.$request->get('id'),
                'description' => 'required|max:500|min:20'
            ];
        }else{
            return [  
                'name' => 'required|max:50|min:5|string|unique:categories,name,'.$this->id,
                'description' => 'required|max:500|min:20'
            ];
        } 
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter Name.',
            'name.string' => 'Do not enter special characters.',
            'name.max:50' => 'Maximum Name length is 50 characters.',
            'name.min:5' => 'Minimum Name length is 5 characters.',
            'name.unique' => 'Category name already exists.',
            'description.required' => 'Please enter Infomation.',
            'description.max:300' => 'Maximum Description length is 500 characters.',
            'description.min:20' => 'Minimum Name length is 20 characters.',
        ];
    }
}
