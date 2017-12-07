<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserRequest
 * @package App\Http\Requests\Backend\User
 */
class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:user|email|max:255',
            'employee_id' => 'nullable|unique:user',
            'password' => 'required|min:6|confirmed',
            'admin_flag' => 'boolean'
        ];
    }
}
