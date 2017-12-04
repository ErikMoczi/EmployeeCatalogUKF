<?php

namespace App\Http\Requests\Backend\Comment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCommentRequest
 * @package App\Http\Requests\Backend\Comment
 */
class UpdateCommentRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'employee_id' => 'required',
            'comment' => 'required|min:5|max:2000',
        ];
    }
}
