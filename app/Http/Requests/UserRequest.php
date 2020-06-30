<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required|max:50|min:5|string|unique:users,name,'.$request->get('id'),
                'address' => 'required',
                'roles' => 'required',
                'password' => 'required|min:8|',
                'email' => 'required|email|',
                'phone' => 'required|numeric|regex:/^(0)[0-9]{9}/',
            ];
        }else{
            return [  
                'name' => 'required|max:50|min:5|string|unique:users,name,'.$this->id,
                'address' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png',
                'roles' => 'required',
                'password' => 'required|min:8|',
                'email' => 'required|email|',
                'phone' => 'required|regex:/(0)[0-9]{9}/|size:10',
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
            'address.required' => 'Please enter Infomation.',
            'image.required' => 'No image selected.',
            'image.image' => 'Uploaded file must be an image.',
             'image.mimes' => 'Only upload images in jpeg, jpg, png format.',
            'roles.required' => 'Role not be empty.',
            'password.required' => 'Please Enter Password.',
            'password.min.8' => 'Minimum PassWord length is 8 characters.',
            'email.required' => 'Please Enter Email',
            'email.email' => 'The email must be a valid email address.',
            'phone.required' => 'Please enter Phone.',
            'phone.regex' =>'Phone invalid',
            'phone.size' =>'Phone number does not exist ',
            
        ];
    }
}

