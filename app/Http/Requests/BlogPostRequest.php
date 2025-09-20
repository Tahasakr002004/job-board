<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title'     => 'bail|required|string|max:255|unique:post',
            'body'      => 'required|string|min:10',
            'author'    => 'required|string|max:100',
            'published' => 'required|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required'   => 'Title is required.',
            'title.string'     => 'Title must be a valid string.',
            'title.max'        => 'Title may not be greater than 255 characters.',

            'body.required'    => 'Body is required.',
            'body.string'      => 'Body must be text.',
            'body.min'         => 'Body must be at least 10 characters.',

            'author.required'  => 'Author name is required.',
            'author.string'    => 'Author must be a valid name.',
            'author.max'       => 'Author may not be greater than 100 characters.',

            'published.required' => 'Published field is required.',
            'published.boolean'  => 'Published must be true or false.',
        ];
    }
}
