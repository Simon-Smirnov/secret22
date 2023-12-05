<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'commentable_id' => '',
            'commentable_type' => '',
            'author' => 'required|min:2|max:64',
            'content' => 'required|min:5|max:512'
        ];
    }

    public function attributes() {
        return [
            'commentable_id' => 'Essence`s id',
            'commentable_type' => 'Essence`s type',
            'author' => 'Commnet`s author',
            'content' => 'Comment',
        ];
    }

    public function checkIdAndCommentable() {
        return array_key_exists($this->commentable_type, config('commentable'));
    }
}
