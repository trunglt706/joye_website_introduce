<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertContactRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'description' => 'required|max:255',
            'group_id' => 'required|exists:service_groups,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập họ tên!',
            'name.max' => 'Dữ liệu không phù hợp!',
            'email.required' => 'Nhập email hoặc số điện thoại!',
            'email.max' => 'Dữ liệu không phù hợp!',
            'description.required' => 'Nhập yêu cầu!',
            'description.max' => 'Dữ liệu không phù hợp!',
            'group_id.required' => 'Chọn dịch vụ!',
            'group_id.exists' => 'Dịch vụ không phù hợp!',
        ];
    }
}
