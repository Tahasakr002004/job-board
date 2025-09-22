<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author'  => 'required|string|max:100',
            'content' => 'required|string|min:3|max:1000',
            'post_id' => 'required|exists:post,id' // ensure post exists
        ];
    }

    public function messages(): array
    {
        return [
            'author.required'  => 'Author field is required.',
            'author.string'    => 'Author must be text.',
            'author.max'       => 'Author may not exceed 100 characters.',

            'content.required' => 'Content field is required.',
            'content.string'   => 'Content must be text.',
            'content.min'      => 'Content must be at least 3 characters.',
            'content.max'      => 'Content may not exceed 1000 characters.',

            'post_id.required' => 'A post must be selected.',
            'post_id.exists'   => 'The selected post does not exist.',
        ];
    }
}
