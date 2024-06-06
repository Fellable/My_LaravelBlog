<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
        return [
            'title' => 'string',
            'content' => 'string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'technology' => 'nullable|string',
            'additional_tech' => 'nullable | string',
            'gitHub' => 'nullable | string',
            'queuery' => 'nullable | int',
            'category_id' => ' integer |exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable | integer| exists:tags,id',
        ];
    }
}
