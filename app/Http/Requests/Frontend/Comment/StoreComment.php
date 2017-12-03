<?php

namespace App\Http\Requests\Frontend\Comment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreComment
 * @package App\Http\Requests\Frontend\Comment
 */
class StoreComment extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000',
        ];
    }
}
