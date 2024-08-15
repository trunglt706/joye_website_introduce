<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name' => 'required',
            'phone' => ['required', 'regex:/^[0-9]{10,11}$/'],
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập họ tên!',
            'phone.required' => 'Nhập số ĐT',
            'phone.regex' => 'Số điện thoại chưa đúng định dạng!',
            'comment.required' => 'Nhập nội dung liên hệ!',
        ];
    }
}
