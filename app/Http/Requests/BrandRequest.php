<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
               
                'name' => 'required|max:50|min:5|string|unique:brands,name,'.$request->get('id'),
                'logo' => 'mimes:jpeg,jpg,png',
                'address' => 'required|max:100|min:5',
                'phone_no' => 'required|regex:/(0)[0-9]{9}/|size:10',

               
            ];
        }else{
            return [
               
                'name' => 'required|max:50|min:5|string|unique:brands,name,'.$this->id,
                'logo' => 'required|mimes:jpeg,jpg,png',
                'address' => 'required|max:100|min:5',
                'phone_no' => 'required|regex:/(0)[0-9]{9}/|size:10',
                
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
            'address.required' => 'Please enter Address.',
            'address.max:100' => 'Maximum Address length is 100 characters.',
            'address.min:10' => 'Minimum Address length is 5 characters.',
            'phone_no.required' => 'Please enter Phone.',
            'phone_no.size' => 'Phone size is 10 characters.', 
            'logo.required' => 'Please select Logo.',    
            'logo.mimes' => 'Please select file jpg/jpeg/png.',
            
        ];
    }
}
