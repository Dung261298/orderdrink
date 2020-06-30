<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
        if ($this->method()=='PUT'){
            return [
                'title' => 'required|max:50|min:5|string',
                'name' => 'required|max:50|min:5|string',
                'address' => 'required|max:100|min:10',
                'content' => 'required|max:300|min:20',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
                'email' => 'required|email|string',
                'logo' => 'mimes:jpeg,jpg,png',
                'timeopen' => 'required',
                'timeclose' => 'required',
            ];
        }else{
            return [
                'title' => 'required|max:50|min:5|string',
                'name' => 'required|max:50|min:5|string',
                'address' => 'required|max:100|min:10',
                'content' => 'required|max:300|min:20',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
                'email' => 'required|email|string',
                'logo' => 'required|mimes:jpeg,jpg,png',
                'timeopen' => 'required',
                'timeclose' => 'required',
            ];
        } 
    }
    public function messages()
    {
        return [
            'title.required' => 'Please enter Title.',
            'title.string' => 'Do not enter special characters.',
            'title.max:50' => 'Maximum Title length is 50 characters.',
            'title.min:5' => 'Minimum Title length is 5 characters.',
            'name.required' => 'Please enter Name.',
            'name.string' => 'Do not enter special characters.',
            'name.max:50' => 'Maximum Name length is 50 characters.',
            'name.min:5' => 'Minimum Name length is 5 characters.',
            'address.required' => 'Please enter Address.',
            'address.max:100' => 'Maximum Address length is 100 characters.',
            'address.min:10' => 'Minimum Address length is 10 characters.',
            'phone.required' => 'Please enter Phone.',
            'phone.numeric' =>'Invalid Phone Number.',
            'phone.size' => 'Phone size is 10 characters.', 
            'content.required' =>'Please enter Content.',
            'content.max:300' => 'Maximum Content length is 300 characters.',
            'content.min:20' => 'Minimum Content length is 20 characters.',
            'email.required' => 'Please enter Email.',
            'email.email' => 'Invalid email.',
            'email.string' => 'Invalid email.',
            'logo.required' => 'Please select Logo.',    
            'logo.mimes' => 'Please select file jpg/jpeg/png.',    
        ];
    }
}
