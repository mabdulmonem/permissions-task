<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
        $id=  ",".$this->id ?: null;

        return [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'slug'=>'required|string|unique:permissions,slug'.$id,
        ];
    }
}
