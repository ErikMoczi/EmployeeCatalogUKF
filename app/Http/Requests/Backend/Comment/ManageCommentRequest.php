<?php

namespace App\Http\Requests\Backend\Comment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ManageCommentRequest
 * @package App\Http\Requests\Backend\Comment
 */
class ManageCommentRequest extends FormRequest
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

        ];
    }
}
