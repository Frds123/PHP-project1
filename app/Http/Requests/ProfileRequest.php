<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'full_name' => 'Required',
            // 'mobile_no' => 'Required|min:11|max:11|unique:users',
            'blood_group' => 'Required',
            'date_of_birth' => 'Required',
            'gender' => 'Required',
            'marital_status' => 'Required',
            'designation' => 'Required',
            'organization' => 'Required',
            'faculty_id' => 'Required',
            'academic_regi_no' => 'Required',
            'present_address' => 'Required',
            'present_add_ps' => 'Required',
            'present_district' => 'Required',
            'present_add_zip' => 'Required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'profession' => 'required',
            'office_address' => 'required',
            'office_add_ps' => 'required',
            'office_district' => 'required',
            'office_add_zip' => 'required',
            'academic_hall_of_residence' => 'required',
            'permanent_address' => 'required',
            'permanent_add_ps' => 'required',
            'permanent_district' => 'required',
            'permanent_add_zip' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}