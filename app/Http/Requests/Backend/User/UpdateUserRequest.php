<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest
 * @package App\Http\Requests\Backend\User
 */
class UpdateUserRequest extends FormRequest
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
            'email' => 'required|unique:user,id|email|max:255',
            'employee_id' => 'nullable|unique:user,id',
            'admin_flag' => 'boolean'
        ];
    }
}
