<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
                'name' => 'required|max:50|min:5|regex:/^[A-Za-z\s-_]+$/|unique:tags,name,'.$request->get('id'),
                 ];
        }else{
            return [
                'name' => 'required|max:50|min:5|regex:/^[A-Za-z\s-_]+$/|unique:tags,name,'.$this->id,
                
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
            'name.unique' => 'Tag name already exists.',        
        ];
    }
}

