<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->me ? "," . auth()->id() : ("," . $this->id ?: null);

        $pass = $this->password != null ? "required|confirmed|min:8" : "nullable";

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email' . $id,
            'password' => "sometimes|$pass",
            'phone' => 'required|numeric|unique:users,phone' . $id
        ];
    }

    /**
     * @return array
     */
//    public function messages(): array
//    {
//        return [
//            'name' => trans('name'),
//            'email' => trans('email'),
//            'password' => trans('password'),
//            'phone' => trans('phone'),
//        ];
//    }
}
