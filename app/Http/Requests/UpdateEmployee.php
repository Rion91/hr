<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployee extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('employee');
        return [
            'employee_id' => ['required', Rule::unique('users', 'employee_id')->ignore($id)],
            'name' => 'required',
            'phone' => ['required', Rule::unique('users', 'phone')->ignore($id)],
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)],
            'nrc_number' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'department_id' => 'required',
            'date_of_join' => 'required',
            'is_present' => 'required',
            'profile_img' => 'required|image',
        ];
    }
}
