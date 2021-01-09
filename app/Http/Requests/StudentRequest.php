<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * السماح لتعامل المستخدم غير المسجل دخول
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
            'name'=>'required|max:50',
            'email'=>'required|email|max:50',//|unique:students
            'phone'=>'required|max:20',
            'gender'=>'required|max:1',
            'city_id'=>'required',
            'image' => 'image'
        ];
    }
}
