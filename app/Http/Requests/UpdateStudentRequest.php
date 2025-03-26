<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|unique:students,student_id,' . $this->route('student')->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('student')->user_id,
            'address' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'contact_number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',  // Optional for update
        ];
    }

}
